<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        if (session('user_type') === 's_admin'){
//            return $next($request);
//        }else if(session('user_type') === 'admin'){
//            return $next($request);
//        }else{
//            session()->flash('welcome to eshop.');
//            return redirect()->route('login');
//        }




        if (Auth::user()->user_type == 's_admin'){
            return $next($request);
        }elseif (Auth::user()->user_type == 'admin'){
            return $next($request);
        }else{
            return $next($request);
        }



        return $next($request);
    }
}
