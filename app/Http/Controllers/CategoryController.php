<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Entities\RegisterCategory;

class CategoryController extends Controller
{
    protected $category;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegisterCategory $category)
    {
        $this->middleware('auth:admin');
        $this->category = $category;
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
        $request->validate([
            'title' => 'required',
            ]);
          
        $category = $this->category->registerCategory($request->all());
            
        return redirect('/admin');
    }
}
