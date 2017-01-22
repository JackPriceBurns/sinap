<?php

namespace App\Http\Controllers;

use App\Classes\Auth;

class PagesController extends Controller
{
    public function home($args = null) {
        return view("pages.home");
    }

    public function login() {

        $check = Auth::check();

        if($check['success']) {
            return redirect('/admin/overview');
        } else {
            if(isset($check['cookie'])){
                return redirect()->action('PagesController@home', ['error'=>$check['error']])->withCookie($check['cookie']);
            }
        }

        return view("pages.login");
    }
}
