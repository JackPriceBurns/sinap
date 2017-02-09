<?php

namespace App\Http\Middleware;

use App\Classes\Auth;
use Closure;

class CheckTeacher
{

    public function handle($request, Closure $next)
    {
        if(!Auth::is('Teacher')){
            return redirect('student/overview');
        }
        return $next($request);
    }
}
