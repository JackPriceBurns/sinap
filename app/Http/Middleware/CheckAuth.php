<?php

namespace App\Http\Middleware;

use App\Classes\Auth;
use Closure;
use Cookie;
use Crypt;
use Illuminate\Http\Request;

class CheckAuth
{

    private $except = [
            'login',
            '/',
        ];

    public function handle($request, Closure $next) {

        $check = Auth::check();

        if(!$check['success']){

            $loginError = (isset($check['error'])) ? $check['error'] : 'please login';

            if($this->isExcept($request)){
                $request->merge(['authenticated' => false]);
            } else {
                $redirect = 'login?error=' . $loginError;
                if (isset($check['cookie'])) {
                    return redirect($redirect)->withCookie($check['cookie']);
                } else return redirect($redirect);
            }

        } else {

            $request->merge(['authenticated' => true, 'auth_cookie'=>$check['cookie'], 'role_name'=>$check['user']->role->name, 'user'=>$check['user']]);

        }

        return $next($request);
    }

    private function isExcept(Request $request){

        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->is($except)) {
                return true;
            }
        }

        return false;

    }
}
