<?php

namespace App\Http\Controllers;

use App\Session;
use App\User;
use Carbon\Carbon;


class OverviewController extends Controller
{
    public function overview(){

        $users = collect([]);

        foreach(Session::get() as $session){
            if((new Carbon($session->expiration))->subHours(3)->greaterThan((new Carbon())->subMinutes(5))){
                $user = User::find($session->user_id);
                if (!$users->search($user)) {
                    $users->push($user);
                }
            }
        }

        return view('pages.overview', compact('users'));

    }
}
