<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
// use App\Entities\RegisterCategory;

class CategoryController extends Controller
{
    protected $categories;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct(RegisterCategory $categories)
    public function __construct()

    {
        $this->middleware('auth:admin');
        // $this->categories = $categories;
    }

    public function index()
    {
        return view('category.index');
    }

    public function create()
    {
        
        return view('category.create');
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
            
        // $category = $this->categories->registerCategory($request->all());
            
        return redirect('/admin');
    }
}
