<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use App\Entities\RegisterUser;

class UserController extends Controller
{
    protected $users;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegisterUser $users)
    {
        $this->middleware('auth:admin');
        $this->users = $users;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index',compact('users'));
    }

    
    public function create()
    {
        $this->authorize('create-user');

        return view('users.create');
    }
    
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
            ]);
            
            $users = $this->users->register($request->all());
            
        return redirect()->route('show_user', $users->id);
    }


    public function show($id)
    {
        $users = User::find($id);
        return view('users.show',compact('users'));
    }

 

    public function edit($id)
    {
        $this->authorize('update-user');

        $users = User::find($id);

        return view('users.edit',compact('users'));   
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
            ]); 

        $users = User::find($id);
        

        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = Hash::make($request->input('password'));

        $users->save();

        return redirect()->route('show_user', $users->id);
    }

    public function destroy($id)
    {
        $this->authorize('delete-user');

        $users = User::find($id);
        $users->delete();

        return redirect()->route('list_all_users');
    }

    
}
