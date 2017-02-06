<?php

namespace App\Http\Middleware;

use App\Classes\Auth;
use Closure;

class CheckTeacher
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
        if(!Auth::is('Teacher')){
            return redirect('student/overview');
        }
        return $next($request);
    }
}
