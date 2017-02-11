<?php

namespace App\Http\Middleware;

use App\Classes\Auth;
use Closure;

class CheckAuth
{

    public function handle($request, Closure $next)
    {
        if(!Auth::check(true)['success']){
            return redirect('/');
        }

        return $next($request);
    }
}
