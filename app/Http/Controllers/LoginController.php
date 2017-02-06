<?php

namespace App\Http\Controllers;

use App\Classes\Auth;
use Cookie;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login(Request $request){

        $check = Auth::check();

        if($check['success']) {
            return redirect('/admin/overview');
        } else {
            if(isset($check['cookie'])){
                return redirect()->action('PagesController@index', ['error'=>$check['error']])->withCookie($check['cookie']);
            }
        }

        $auth = Auth::attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')]);

        if($auth['success']){
            return redirect('/admin/overview')->withCookie($auth['cookie']);
        }

        return view('pages.login', ['error'=>'invalid username or password']);
    }

    public function logout(){
        return redirect('/')->withCookie(Cookie::forget('auth'));
    }
}
