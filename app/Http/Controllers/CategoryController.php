<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
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
        $categories = Category::all();
        return view('category.index',compact('categories'));
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
            
        return redirect()->route('show_category', $category->id);
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('category.show',compact('category'));
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('category.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            ]); 

        $category = Category::find($id);

        $category->title = $request->input('title');

        $category->save();

        return redirect()->route('show_category', $category->id);
    }

    public function destroy($id)
    {
        $products = Product::where('category_id', $id);
        $products->delete();
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('list_all_category');
    }
    
}
