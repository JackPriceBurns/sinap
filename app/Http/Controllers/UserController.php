<?php

namespace App\Http\Controllers;

use App\Badge;
use App\Role;
use App\Session;
use App\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index(){
        $users_db = User::orderBy('name', 'ASC')->get();
        $badges = Badge::get();
        $roles = Role::get();
        $sessions = Session::get();
        $users = collect();
        foreach ($users_db as $user) {
            $badges_user = $badges->where('user_id', $user->id);
            $role = $roles->find($user->role_id);
            $session = $sessions->where('user_id', $user->id)->sortByDesc('expiration')->first();
            $last_seen = ($session == null) ? 'never' : (new Carbon($session->updated_at))->diffForHumans();
            $users->push(['user' => $user, 'badges' => $badges_user, 'role' => $role, 'last_seen' => $last_seen]);
        }

        return view('user.users', compact('users'));
    }

    public function user($id){

        $user = User::find($id);

        if($user === null){
            return redirect('/user/?error=user does not exist');
        }


        return view('user.user', compact('user'));
    }
}
