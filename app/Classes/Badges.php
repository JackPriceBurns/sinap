<?php

namespace App\Classes;

class Badges
{

    public static function get($user_id){
        $badges = Badge::where('user_id', $user_id);
    }

}