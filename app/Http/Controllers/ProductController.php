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
    public function __construct(RegisterProduct $products)
    {
        $this->middleware('auth:admin');
        $this->products = $products;
    }

    public function index()
    {
        return view('product.index');
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
                    
        return redirect('/admin');
    }
}
