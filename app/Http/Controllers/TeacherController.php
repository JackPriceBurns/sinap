<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TeacherController extends Controller
{
    public function __construct()
    {
        if(!Auth::guard('teacher')->check()){
            return Redirect::to('student/overview')->send();
        }
    }
}
