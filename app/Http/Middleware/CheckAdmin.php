<?php

namespace App\Http\Middleware;

use App\Classes\Auth;
use Closure;

class CheckAdmin
{

    public function handle($request, Closure $next)
    {
        if(!Auth::is('Admin')){
            return redirect('teacher/overview');
        }
        return $next($request);
    }
}
