<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarService;
use App\Car;
use App\Product;
use App;
class CarServiceController extends Controller
{
    protected $car_services;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $services = CarService::all();

        return view('car_service.index', compact('services'));
    }

    public function create()
    {
        $this->authorize('create-car-service');

        $cars = Car::orderBy('plate_number')->pluck('plate_number','id');
        $products = Product::orderBy('description')->pluck('description','id');
        
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
        
        return redirect()->route('show_car_service', [app()->getLocale(),$services->id]);
    }

    public function show($locale,$id)
    {
        $services = CarService::find($id);
        
        return view('car_service.show', compact('services'));
    }

    public function edit($locale,$id)
    {
        $this->authorize('update-car-service');

        $cars = Car::orderBy('plate_number')->pluck('plate_number','id');
        $products = Product::orderBy('description')->pluck('description','id');
        
        $services = CarService::find($id);

        return view('car_service.edit',compact('services', 'cars','products'));   
    }

    public function update($locale,Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'service_date' => 'required',
            'car_id' => 'required',
            'product_id' => 'required'
            ]); 

        $services = CarService::find($id);
        

        $services->title = $request->input('title');
        $services->price = $request->input('price');
        $services->description = $request->input('description');
        $services->service_date = $request->input('service_date');
        $services->car_id = $request->input('car_id');
        $services->product_id = $request->input('product_id');

        $services->save();

        return redirect()->route('show_car_service', [app()->getLocale(),$services->id]);
    }

    public function destroy($locale,$id)
    {
        $this->authorize('delete-car-service');

        $services = CarService::find($id);
        $services->delete();
        
        return redirect()->route('list_all_car_service', app()->getLocale());
    }
}
