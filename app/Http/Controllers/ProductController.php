<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Entities\RegisterProduct;

class ProductController extends Controller
{
    protected $products;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        // $this->products = $products;
    }

    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('title')->pluck('title','id');
        
        return view('product.create',compact('categories'));

    }

    
    public function store(Request $request)
    { 
        $request->validate([
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            ]);

        $products = new Product;

        $products->description = $request->description;
        $products->price = $request->price;
        $products->category_id = $request->category_id;

        $products->save();

        return redirect()->route('show_product', $products->id);   
    }

    public function show($id)
    {
        $products = Product::find($id);
        
        return view('product.show',compact('products'));
    }
}
