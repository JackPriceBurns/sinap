<?php

namespace App\Http\Controllers;

use app\Classes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;

class LoginController extends Controller
{

    public function login(Request $request){

        if(Auth::check()) {
            return Redirect::to('/admin/overview')->send();
        } else {
            Cookie::set
        }

        $credentials = ['email'=>$request->input('email'), 'password'=>$request->input('password')];

        if(Auth::guard('student')->attempt($credentials)) {
            //die("1");
            return Redirect::to('/student/overview')->send();
        }

        if(Auth::guard('teacher')->attempt($credentials)) {
            //die("2");
            return Redirect::to('/teacher/overview')->send();
        }

        if(Auth::guard('admin')->attempt($credentials)) {
            //die("3");
            return Redirect::to('/admin/overview')->send();
        }

        return view('pages.login', ['error'=>'invalid username or password']);
    }
}
