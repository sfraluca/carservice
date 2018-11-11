<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
use Illuminate\Http\Request;
use App\Entities\RegisterAdmin;

class AdminRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/admin';
    protected $admins;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegisterAdmin $admins)
    {
        //  $this->middleware('guest:admin');
         $this->admins = $admins;
    }


    public function createAdmin()
    {
        $roles = Role::orderBy('name')->pluck('name','id');
        
        return view('auth.admin-register',compact('roles'));
    }
    

    /**
     * create the tenant with minimal data
     * and notify by email about registration resuming option  
     */
    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'job_title' => 'required',
            'email' => 'required',
            'role' => 'required'
            ]);
            
            $admin = $this->admins->register($request->all());
            
            return redirect()->route('dashboard');
    }

   
}
