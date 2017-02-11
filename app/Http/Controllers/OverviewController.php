<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Auth;

class OverviewController extends Controller
{
    public function overview(){

        if(Auth::is("Student")){
            return view('overview.student');
        }

        if(Auth::is("Teacher")){
            return view('overview.teacher');
        }

        if(Auth::is("Admin")){
            return view('overview.admin');
        }

    }
}
