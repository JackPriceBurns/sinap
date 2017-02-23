<?php

namespace App\Http\Controllers;

use App\Session;
use App\User;
use App\Role;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function sessions(){

        $sessions = Session::get();

        return view();
    }

    public function students(){

        $students = ['students' => User::where('role_id', Role::where('name', 'Student')->first()->id)->get()];

        return view('manage.students', $students);

    }
}
