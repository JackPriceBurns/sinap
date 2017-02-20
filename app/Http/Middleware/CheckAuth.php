<?php

namespace App\Http\Middleware;

use App\Classes\Auth;
use Closure;
use Cookie;
use Crypt;
use Illuminate\Http\Request;
use App\Role;
use App\User;

class CheckAuth
{

    private $except = [
            'login',
            '/',
        ];

    public function handle($request, Closure $next)
    {

        if($this->isExcept($request)){
            $check = Auth::check(true);

            if(!$check['success']){
                $request->merge(['authenticated' => false]);
            } else {
                $cookie = json_decode(Crypt::decrypt(Cookie::get('auth')));
                $role = Role::find(User::find($cookie->id)->role_id)->name;

                $request->merge(['authenticated' => true, 'auth_cookie'=>$cookie, 'role_name'=>$role]);
            }

            return $next($request);
        }

        $check = Auth::check();

        if(!$check['success']){
            if(isset($check['cookie'])){
                return redirect('login?error=' . $check['error'])->withCookie($check['cookie']);
            }
            return redirect('login?error=please login');
        }

        $cookie = json_decode(Crypt::decrypt(Cookie::get('auth')));
        $role = Role::find(User::find($cookie->id)->role_id)->name;

        $request->merge(['authenticated' => true, 'auth_cookie'=>$cookie, 'role_name'=>$role]);

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
