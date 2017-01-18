<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PagesController extends Controller
{
    public function home() {
        return view("pages.home");
    }

    public function login() {

        if(Auth::guard('student')->check() || Auth::guard('teacher')->check() || Auth::guard('admin')->check()){
            return Redirect::to('teacher/overview')->send();
        }

        return view("pages.login");
    }
}
