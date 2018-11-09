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
        return view('cars.index');
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
        
        return redirect('/admin');
    }
}
