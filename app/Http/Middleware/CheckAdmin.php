<?php

namespace App\Http\Middleware;

use App\Classes\Auth;
use Closure;

class CheckAdmin
{

    public function handle($request, Closure $next)
    {
        if(!Auth::is('Admin')){
            return redirect('/overview');
        }
        return $next($request);
    }
}
