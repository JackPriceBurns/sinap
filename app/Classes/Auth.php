<?php

namespace App\Classes;

use App\User;
use App\Session;
use Carbon\Carbon;
use Cookie;
use Request;
use Jenssegers\Agent\Agent;

class Auth
{

    /**
     * @return array
     */
    public static function check(){

        if(Cookie::has('auth')){

            $cookie = json_decode(Cookie::get('auth'));
            $ip = Request::ip();
            $agent = new Agent();
            $platform = $agent->browser() . ":" . $agent->version($agent->browser()) . "\\" . $agent->platform() . ":" . $agent->version($agent->platform());

            $session = Session::where('auth_id', $cookie->token)->first();

            if($session === null){
                return ['success'=>false, 'cookie'=>Cookie::forget('auth'), 'error'=>'Unable to find session'];
            }

            if($ip !== $session->ip_address || $platform !== $session->platform){
                $session->delete();
                return ['success'=>false, 'cookie'=>Cookie::forget('auth'), 'error'=>'Platform or IP mismatch'];
            }

            if(Carbon::now() > $session->expiration){
                $session->delete();
                return ['success'=>false, 'cookie'=>Cookie::forget('auth'), 'error'=>'Session expired'];
            }

            $session->expiration = Carbon::now()->addHours(3);

            $session->save();

            return ['success'=>true];

        }
        return ['success'=>false];

    }

    /**
     * @param array $credentials
     * @return array
     */
    public static function attempt(array $credentials){

        $user = User::where('email', $credentials['email'])->first();

        if($user === null){
            return ['success'=>false];
        }

        if($user->password !== Hash::hash($credentials['password'], $user->password_salt)){
            return ['success'=>false];
        }

        $contents = [
            'id'=>$user->id,
            'email'=>$user->email,
            'password'=>Hash::hash($credentials['password'], $user->password_salt),
            'token'=>bin2hex(openssl_random_pseudo_bytes(32))
        ];

        $cookie = Cookie::make(
            'auth',
            json_encode($contents)
        );

        $agent = new Agent();
        $session = new Session();

        $session->user_id = $user->id;
        $session->auth_id = $contents['token'];
        $session->ip_address = Request::ip();
        $session->platform = $agent->browser() . ":" . $agent->version($agent->browser()) . "\\" . $agent->platform() . ":" . $agent->version($agent->platform());
        $session->expiration = Carbon::now()->addHours(3);

        $session->save();

        return ['success'=>true, 'cookie'=>$cookie];
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