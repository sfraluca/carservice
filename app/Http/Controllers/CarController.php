<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\CarService;
use App\Entities\RegisterCar;
use App\User;
use DB;
use Carbon;
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
        $carCount = DB::table('cars')->select("id")->count();
        $servicesCount = DB::table('car_services')->select("id")->whereBetween('created_at', [
            Carbon\Carbon::now()->startOfWeek(),
            Carbon\Carbon::now()->endOfWeek(),
        ])->count();
        $usersCount = DB::table('users')->select("id")->whereBetween('created_at', [
            Carbon\Carbon::now()->startOfWeek(),
            Carbon\Carbon::now()->endOfWeek(),
        ])->count();
        $carsMonth = DB::table('cars')->whereBetween('created_at', [
            Carbon\Carbon::now()->startOfMonth(),
            Carbon\Carbon::now()->endOfMonth(),
        ])->get();
        $usersMonth = DB::table('users')->whereBetween('created_at', [
            Carbon\Carbon::now()->startOfMonth(),
            Carbon\Carbon::now()->endOfMonth(),
        ])->get();
        return view('auth.admin.dashboard', compact('carCount', 'servicesCount','usersCount','carsMonth','usersMonth'));
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
            'plate_number' => 'required|unique',
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

        return redirect()->route('show_car',[ app()->getLocale(),$car->id]);
    }

    public function show($locale,$id)
    {
        $car = Car::find($id);

        return view('cars.show',compact('car'));
    }

    public function edit($locale,$id)
    {
        $this->authorize('update-car');

        $car = Car::find($id);

        return view('cars.edit',compact('car'));
    }

    public function update($locale,Request $request, $id)
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

        return redirect()->route('show_car', [app()->getLocale() ,$car->id]);
    }

    public function destroy($locale,$id)
    {
        $this->authorize('delete-car');
        
        $services = CarService::where('car_id', $id);
        $services->delete();
        $car = Car::find($id);
        $car->delete();

        return redirect()->route('list_all_cars', app()->getLocale());
    }
}
