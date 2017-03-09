<?php

namespace App\Http\Controllers;

use App\User;
use App\Badge;
use App\Role;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('name', 'ASC')->get();
        $badged_users = array();
        foreach($users as $user){
            $badges = Badge::where('user_id', $user->id)->get();
            $role = Role::find($user->role_id);
            $new_user = ['user' => $user, 'badges' => $badges, 'role' => $role];
            array_push($badged_users, $new_user);
        }

//        foreach($badged_users as $user){
//            echo $user['user'] . '<br />';
//            echo $user['badges'] . '<br />';
//            echo $user['role'] . '<br />';
//            echo '<hr />';
//        }
//        exit();

        return view('user.users', ['users' => $badged_users]);
    }

    public function user($id){

        $user = User::find($id);

        if($user === null){
            return redirect('/user/?error=user does not exist');
        }


        return view('user.user', ['user' => $user]);
    }
}
