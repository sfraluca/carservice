<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Role;
use Illuminate\Support\Facades\Hash;
use App\Entities\RegisterAdmin;
use App;
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
        $this->authorize('create-admin');

        $roles = Role::orderBy('name')->pluck('name','id');
        
        return view('auth.register-admin.create',compact('roles'));
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
            
        return redirect()->route('show_admin', [app()->getLocale(),$admin->id]);
    }


    public function show($locale,$id)
    {
        $admin = Admin::find($id);
        return view('auth.register-admin.show',compact('admin'));
    }

 

    public function edit($locale,$id)
    {
        $this->authorize('update-admin');

        $roles = Role::orderBy('name')->pluck('name','id');
        $admins = Admin::find($id);

        return view('auth.register-admin.edit',compact('admins', 'roles'));   
    }

    public function update($locale,Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'job_title' => 'required',
            'role' => 'required'
            ]); 

        $admin = Admin::find($id);
        

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->job_title = $request->input('job_title');

        $admin->save();

        return redirect()->route('show_admin', [app()->getLocale(),$admin->id] );
    }

    public function destroy($locale,$id)
    {
        $this->authorize('delete-admin');

        $admin = Admin::find($id);
        $admin->delete();

        return redirect()->route('list_all_admins', app()->getLocale());
    }

    
}
