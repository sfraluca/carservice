<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
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
}
