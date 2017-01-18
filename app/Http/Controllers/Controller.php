<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $access = 'guest';

        if(Auth::guard('admin')->check()) $access = 'admin';
        if(Auth::guard('student')->check()) $access = 'student';
        if(Auth::guard('teacher')->check()) $access = 'teacher';
        //die($access);
    }
}
