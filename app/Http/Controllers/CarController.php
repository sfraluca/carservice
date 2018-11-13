<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\CarService;
use App\Entities\RegisterCar;

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
    }
    //form for upload
    public function dashboard()
    {
        return view('auth.admin.dashboard');
    }
    //save in db
    public function storeImage(Request $request)
    {
        $request->validate([
            'image' => 'required',
            ]);
            
        $car = $this->cars->upload($request->all());
        return redirect()->route('check', $car->id);

        //return redirect()->route('show_car', $car->id);
        //redirect
        //return view('auth.admin.dashboard');
    }
    //api
    public function check($ImageId)
    {

        //check plate number
       //$car = Car::find($id);
       return redirect()->route('show_car', $car->id);
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
