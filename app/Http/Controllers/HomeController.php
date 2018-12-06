<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('platform.home');
    }
    public function car()
    {
    //     $cars = DB::table('users')
    //         ->leftJoin('cars', 'users.id', '=', 'cars.user_id')
    //         ->get();
     $users = DB::table('users')
            ->leftJoin('cars', 'users.id', '=', 'cars.user_id')
            ->get();
    $services = DB::table('cars')
            ->leftJoin('car_services', 'cars.id', '=', 'car_services.car_id')
            ->get();
        return view('platform.mycar',compact('users','services'));
    }
    public function store_plate(Request $request)
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

       // $services = DB::table('cars')->select('id')->where('plate_number', $plateNumber)->get();

        // foreach($services as $service){
        //     $service_id = $service->id;
        //     $url = 'admins/service/show/'. $service_id .'?';
        // }

        return redirect()->route('car', compact('plateNumber'));

    }
}
