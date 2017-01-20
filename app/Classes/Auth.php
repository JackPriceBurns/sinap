<?php

namespace app\Classes;

use App\User;

class Auth
{

    /**
     * @return Boolean
     */
    public static function check(){

        if(Cookie::has('auth')){

            $cookie = Cookie::get('auth');
            print_r($cookie);
            exit();

        }
        return true;

    }

    /**
     * @param array $credentials
     * @return bool
     */
    public static function attempt(array $credentials){

        $user = User::where('email', $credentials['email'])->first();
        

    }

    public static function user(){

    }

    public static function admin(){

    }

    public static function teacher(){

    }

    public static function student(){

    }
}