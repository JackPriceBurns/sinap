<?php

namespace App\Http\Controllers;

use App\User;
use App\Badge;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::get();
        $badged_users = array();
        foreach($users as $user){
            $badges = Badge::where('user_id', $user->id)->get();
            $new_user = ['user' => $user, 'badges' => $badges];
            array_push($badged_users, $user->id, $new_user);
        }
        array_shift($badged_users);
        return view('pages.user', ['users' => $badged_users]);
    }

    public function user(User $id){

    }
}
