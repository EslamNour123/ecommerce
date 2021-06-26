<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::user()){
            return redirect('/login');
        }
        elseif( Auth::user()->role == 'admin'){
            return $next($request);    
        }
        elseif( Auth::user()->role == 'vendor'){
            return redirect()->route('index');
        }
        else{
            return redirect()->back();
        }    
    }
}
