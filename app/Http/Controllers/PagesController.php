<?php

namespace App\Http\Controllers;

use Cookie;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view("pages.home");
    }

    public function login(Request $request) {

        if($request->get('authenticated')) {
            return redirect('/home');
        }

        return view("pages.login");
    }
}
