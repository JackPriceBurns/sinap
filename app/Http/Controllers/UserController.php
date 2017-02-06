<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::get();
        return view('pages.user', ['users' => $users]);
    }

    public function user(User $id){

    }
}
