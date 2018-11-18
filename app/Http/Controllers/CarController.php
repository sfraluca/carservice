<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Image;
use App\CarService;
use App\Entities\RegisterCar;
use App\Entities\RegisterImage;
use DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input as Input;

class CarController extends Controller
{
    protected $cars;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegisterCar $cars)
    {
        $this->middleware('auth:admin');
        $this->cars = $cars;
        $this->image = app(RegisterImage::class);
    }

    //form for upload
    public function dashboard()
    {
        return view('auth.admin.dashboard');
    }
    
    //save in db
    public function storeImage(Request $request)
    {
       $this->validate($request, [
           'image'=>'required'
       ]);
       if($request->hasFile('image')){
            $image = $request->file('image');
            $new_name = rand() .'.'. $image->getClientOriginalExtension();
            $image->move(public_path('images'),$new_name);
            $fileImage = new Image;
            $fileImage->image = $new_name;
            $fileImage->save();
       }else{
           return 'No file selected';
       }

        $client = new \GuzzleHttp\Client();      
        $apiUrl = 'https://api.openalpr.com/v2/recognize?recognize_vehicle=0&country=eu&secret_key=sk_8b541c25e9b8b8051f8ba0f4';
        $imagePath = public_path('images') . '\\' . $new_name;

        $res = $client->request('POST', $apiUrl, [
            'multipart' => [
                    [
                    'name' => 'image',
                    'contents' => fopen($imagePath, 'r')
                    ]
                ]
            ]
        );
   
        $responseArray = json_decode($res->getBody(), true);
        $responseResultArray = $responseArray["results"][0];
        $plateNumber = $responseResultArray["plate"];

        $services = DB::table('cars')->select('id')->where('plate_number', $plateNumber)->get();

        foreach($services as $service){
            $service_id = $service->id;
            $url = 'admins/service/show/'. $service_id .'?';
        }

        return redirect($url);

    }

    public function index()
    {
        $cars = Car::all();
        return view('cars.index',compact('cars'));
    }

    public function create()
    {
        
        return view('cars.create');
    }

    
    public function store(Request $request) 
    {
        $request->validate([
            'plate_number' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'color' => 'required',
            'KW' => 'required',
            'CP' => 'required',
            'car_body' => 'required',
            'motor' => 'required',
            ]); 
           
        $car = $this->cars->registerCar($request->all());

        return redirect()->route('show_car', $car->id);
    }

    public function show($id)
    {
        $car = Car::find($id);
        return view('cars.show',compact('car'));
    }

    public function edit($id)
    {
        $car = Car::find($id);
        return view('cars.edit',compact('car'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plate_number' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'color' => 'required',
            'KW' => 'required',
            'CP' => 'required',
            'car_body' => 'required',
            'motor' => 'required',
            ]); 

        $car = Car::find($id);

        $car->plate_number = $request->input('plate_number');
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->color = $request->input('color');
        $car->KW = $request->input('KW');
        $car->CP = $request->input('CP');
        $car->car_body = $request->input('car_body');
        $car->motor = $request->input('motor');

        $car->save();

        return redirect()->route('show_car', $car->id);
    }

    public function destroy($id)
    {
        $services = CarService::where('car_id', $id);
        $services->delete();
        $car = Car::find($id);
        $car->delete();

        return redirect()->route('list_all_cars');
    }
}
