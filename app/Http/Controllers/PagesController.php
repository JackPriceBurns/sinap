<?php

namespace App\Http\Controllers;

use App\Classes\Auth;
use Cookie;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home($args = null) {
        return view("pages.home");
    }

    public function login(Request $request) {

        if($request->get('authenticated')) {
            return redirect('/home');
        }

        return view("pages.login");
    }
}
