<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function __construct()
    {
        //parent::__construct();

        if(!Auth::guard('student')->check()){
            return Redirect::to('/')->send();
        }
    }

    public function overview(){
        return view('student.overview');
    }
}
