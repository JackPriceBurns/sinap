<?php

namespace App\Http\Controllers;

use App\Classes\Maths\Expression;
use App\Classes\Maths\Terms\X;
use App\Session;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Classes\Auth;

class OverviewController extends Controller
{
    public function overview(){

        $userIDs = [];

        foreach(Session::get() as $session){
            if((new Carbon($session->expiration))->subHours(3)->greaterThan((new Carbon())->subMinutes(5))){
                if(!in_array($session->user_id, $userIDs)){
                    array_push($userIDs, $session->user_id);
                }
            }
        }

        return view('pages.overview', ['activeUsers' => array_map(function($obj){ return User::find($obj); }, $userIDs)]);

    }
}
