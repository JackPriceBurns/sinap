<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function login(Request $request){

        $student = Auth::guard('student');
        $teacher = Auth::guard('teacher');
        $admin = Auth::guard('admin');

        if($student->check() || $teacher->check() || $admin->check()) {
            return Redirect::to('/admin/overview')->send();
        }

        $credentials = ['email'=>$request->input('email'), 'password'=>$request->input('password')];

        if($student->attempt($credentials)) {
            //die("1");
            return Redirect::to('/student/overview')->send();
        }

        if($teacher->attempt($credentials)) {
            //die("2");
            return Redirect::to('/teacher/overview')->send();
        }

        if($admin->attempt($credentials)) {
            //die("3");
            return Redirect::to('/admin/overview')->send();
        }

        return view('pages.login', ['error'=>'invalid username or password']);
    }
}
