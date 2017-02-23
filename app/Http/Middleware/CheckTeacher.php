<?php

namespace App\Http\Middleware;

use App\Classes\Auth;
use Closure;

class CheckTeacher
{

    public function handle($request, Closure $next)
    {

        if(!Auth::is('Teacher') && !Auth::is('Admin')){
            return redirect('/overview');
        }
        return $next($request);
    }
}
