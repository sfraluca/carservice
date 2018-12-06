<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\CarService;
use App\Entities\RegisterCar;
use Auth;
use App\User;
use Validator;
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

    public function dashboard()
    {
        return view('auth.admin.dashboard');
    }
    
    public function index()
    {
        $cars = Car::all();

        return view('cars.index',compact('cars'));
    }

    public function create()
    {
        $this->authorize('create-car');

        $users = User::orderBy('name')->pluck('name','id');

        return view('cars.create',compact('users'));
   
    }

    
    public function store(Request  $request) 
    {
        $request->validate([
            'plate_number' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'color' => 'required',
            'fuel_type' => 'required',
            'motor' => 'required',
            'injection_type' => 'required',
            'motor_code' => 'required',
            'car_body' => 'required',
            'user_id' =>'required'
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
        $this->authorize('update-car');

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
            'fuel_type' => 'required',
            'motor' => 'required',
            'injection_type' => 'required',
            'motor_code' => 'required',
            'car_body' => 'required',
            ]); 

        $car = Car::find($id);

        $car->plate_number = $request->input('plate_number');
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->color = $request->input('color');
        $car->fuel_type = $request->input('fuel_type');
        $car->motor = $request->input('motor');
        $car->injection_type = $request->input('injection_type');
        $car->motor_code = $request->input('motor_code');
        $car->car_body = $request->input('car_body');

        $car->save();

        return redirect()->route('show_car', $car->id);
    }

    public function destroy($id)
    {
        $this->authorize('delete-car');
        
        $services = CarService::where('car_id', $id);
        $services->delete();
        $car = Car::find($id);
        $car->delete();

        return redirect()->route('list_all_cars');
    }
}
