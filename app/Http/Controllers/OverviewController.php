<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Auth;

class OverviewController extends Controller
{
    public function overview(){

        return view('pages.overview');

    }
}
