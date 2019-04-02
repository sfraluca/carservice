<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo()
    {
        return app()->getLocale() . '/home';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout','userLogout']]);
    }
    public function LoginForm()
    {
        return view('auth.login');
    }

    public function platformLogin(Request $request)
    {
        //Validate the form data
        $this->validate($request,[
            'email' =>'required|email',
            'password' => 'required|min:6'
        ]);
        //Atempt to log the user in
        if (Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password], $request->remember)){
            //if succesful, the redirect to their intended location
            return redirect()->intended(route('home', app()->getLocale()));
            // return view('platform.home', compact('lang'));

        }

        //if unsuccesful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email','remember'));
    }
    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();
        //for just one logout
        // $redirect->session()->flush();
        // $redirect->session()->regenerate();
        return redirect()->route('login', app()->getLocale());
        // return view('auth.login');

    }
}
