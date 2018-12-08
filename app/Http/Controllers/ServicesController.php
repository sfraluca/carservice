<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use DB;

class ServicesController extends Controller
{
    protected $products;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $products = DB::table('categories')
            ->leftJoin('products', 'categories.id', '=', 'products.category_id')
            ->get();
        return view('services', compact('products'));
    }
    public function about()
    {
        $products = DB::table('categories')
            ->leftJoin('products', 'categories.id', '=', 'products.category_id')
            ->get();
        return view('platform.about', compact('products'));
    }

    
}
