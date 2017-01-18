<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function __construct()
    {
        if(!Auth::guard('admin')->check()){
            return Redirect::to('teacher/overview')->send();
        }
    }

    public function overview(){

    }
}
