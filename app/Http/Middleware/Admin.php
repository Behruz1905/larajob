<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(Auth::check()){  //logini yoxlayiriq

            $adminRole =  Auth::user()->roles()->pluck('name');
            if($adminRole->contains('admin')){   // login olanin admin olmasini yoxlayiriq
                return $next($request);
            }else{
                return redirect('/');
            }
        }

        return redirect('/');


    }
}
