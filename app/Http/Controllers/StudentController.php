<?php

namespace App\Http\Controllers;

use App\Classes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function overview(){
        return view('student.overview');
    }
}
