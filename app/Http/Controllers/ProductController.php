<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Entities\RegisterProduct;

class ProductController extends Controller
{
    protected $products;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct(RegisterProduct $products)
    public function __construct()
    {
        $this->middleware('auth:admin');
        // $this->products = $products;
    }

    public function index()
    {
        return view('product.index');
    }

    public function create()
    {
        
        return view('product.create');
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
            
        // $product = $this->products->registerProduct($request->all());
            
        return redirect('/admin');
    }
}
