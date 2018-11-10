<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Role;
use App\Entities\RegisterAdmin;

class AdminController extends Controller
{
    protected $admins;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegisterAdmin $admins)
    {
        $this->middleware('auth:admin');
        $this->admins = $admins;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('auth.register-admin.index',compact('admins'));
    }

    public function create()
    {
        $roles = Role::orderBy('name')->pluck('name','id');
        
        return view('auth.register-admin.create',compact('roles'));
        // return view('auth.register-admin.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'job_title' => 'required',
            'email' => 'required',
            'role' => 'required'
            ]);
            
            $admin = $this->admins->register($request->all());
            
        return redirect()->route('show_admin', $admin->id);
    }


    public function show($id)
    {
        $admin = Admin::find($id);
        return view('auth.register-admin.show',compact('admin'));
    }

 

    public function edit(Admin $admin)
    {
        return view('auth.register-admin.edit',compact('admin'));
    }

    public function update(Admin $admin, Request $request)
    {
        // $data = $request->only('title','body');
        // $data['slug'] = str_slug($data['title']);
        // $post = fill($data)->save();
        return back();
    }

    // public function list()
    // {
    //     // $draftsQuery = Post::where('viewed',false);

    //     // if(Gate::denies('see-all-drafts')){
    //         // $draftsQuery = $draftsQuery->where('user_id',auth()->user()->id);
    //     // }
    //     // $posts = $draftsQuery->get();

    //     return view('auth.register-admin.list',compact('admins'));
    // }

    public function publish(Admin $admin)
    {
       $admin->viewed = true;
       $admin->save();
       return back();
    }
}
