<?php

namespace App\Http\Middleware;

use App\Classes\Auth;
use Closure;

class CheckStudent
{

    public function handle($request, Closure $next)
    {
        if(!Auth::is('Student')){
            return redirect('/');
        }
        return $next($request);
    }
}
