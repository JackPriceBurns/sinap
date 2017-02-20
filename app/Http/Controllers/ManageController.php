<?php

namespace App\Http\Controllers;

use App\Session;

class ManageController extends Controller
{
    public function sessions(){

        $sessions = Session::get();

        return view();
    }
}
