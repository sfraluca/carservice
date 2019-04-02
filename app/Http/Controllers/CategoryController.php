<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Entities\RegisterCategory;
use App;
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
        $this->authorize('create-category');
        return view('category.create');
    }

    
    public function store(Request $request)
    { 
        $request->validate([
            'title' => 'required',
            ]);
          
        $category = $this->category->registerCategory($request->all());
            
        return redirect()->route('show_category', [app()->getLocale(),$category->id]);
    }

    public function show($locale,$id)
    {
        $category = Category::find($id);
        return view('category.show',compact('category'));
    }

    public function edit($locale,$id)
    {
        $this->authorize('update-category');

        $category = Category::find($id);

        return view('category.edit',compact('category'));
    }

    public function update($locale,Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            ]); 

        $category = Category::find($id);

        $category->title = $request->input('title');

        $category->save();

        return redirect()->route('show_category', [app()->getLocale(),$category->id]);
    }

    public function destroy($locale,$id)
    {
        $this->authorize('delete-category');

        $products = Product::where('category_id', $id);
        $products->delete();
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('list_all_category', app()->getLocale());
    }
    
}
