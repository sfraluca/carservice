<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarService;
use App\Car;
use App\Product;
// use App\Entities\RegisterCarService;

class CarServiceController extends Controller
{
    protected $car_services;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct(RegisterCarService $car_services)
    public function __construct()

    {
        $this->middleware('auth:admin');
        // $this->car_services = $car_services;
    }

    public function index()
    {
        $services = CarService::all();
        return view('car_service.index', compact('services'));
    }

    public function create()
    {
        $cars = Car::orderBy('plate_number')->pluck('plate_number','id');
        $products = Product::orderBy('description')->pluck('description','id');
        
       // return view('auth.register-admin.create',compact('roles'));
        return view('car_service.create', compact('cars','products'));
    }

    
    public function store(Request $request)
    { 
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'service_date' => 'required',
            'car_id' => 'required',
            'product_id' => 'required'
            ]);
            
            $services = new CarService;

            $services->title = $request->title;
            $services->price = $request->price;
            $services->description = $request->description;
            $services->service_date = $request->service_date;
            $services->car_id = $request->car_id;
            $services->product_id = $request->product_id;
    
            $services->save();
            
            return redirect()->route('show_car_service', $services->id);
    }

    public function show($id)
    {
        $services = CarService::find($id);
        
        return view('car_service.show', compact('services'));
    }
}
