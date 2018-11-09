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
      
        return view('car_service.index');
    }

    public function create()
    {
        $car = Car::orderBy('plate_number')->pluck('plate_number','id');
        $product = Product::orderBy('description')->pluck('description','id');
        
       // return view('auth.register-admin.create',compact('roles'));
        return view('car_service.create', compact('car','product'));
    }

    
    public function store(Request $request)
    { 
        // $request->validate([
        //     'plate_number' => 'required',
        //     'brand' => 'required',
        //     'model' => 'required',
        //     'year' => 'required',
        //     'color' => 'required',
        //     'type' => 'required'
        //     ]);
            
        // $car_service = $this->car_services->registerCarService($request->all());
            
        return redirect('/admin');
    }
}
