<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App;
use Illuminate\Support\Facades\Redirect;
class RedirectIfAuthenticated
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch($guard){
            case 'admin':
                if(Auth::guard($guard)->check()) {
                    return redirect()->intended(route('admin.dashboard'));
                }
                break;
            
            default:
                if (Auth::guard($guard)->check()) {
                // return Redirect::to('/home/ro');
                return redirect()->intended(route('home'));
            }
                break;
        }
        
        return $next($request);
    }
}
