<?php

namespace App\Http\Controllers;

use App\Classes\Auth;
use Cookie;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index(Request $request) {

        if($request->get('authenticated')) {
            return redirect('/home');
        }

        return view("pages.login");
    }

    public function login(Request $request){

        if($request->get('authenticated')) {
            return redirect('/home');
        }

        $auth = Auth::attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')]);

        if($auth['success']){
            return redirect('/')->withCookie($auth['cookie']);
        }

        if(isset($auth['error'])){
            return redirect('login?error=' . $auth['error']);
        }

        return redirect('login?error=invalid username or password');
    }

    public function logout(){
        return redirect('/')->withCookie(Cookie::forget('auth'));
    }
}
