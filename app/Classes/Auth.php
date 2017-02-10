<?php

namespace App\Classes;

use App\Role;
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
    public static function check($passive = false){

        if(Cookie::has('auth')){

            //Carbon::now()->subHours(3);

            $cookie = json_decode(Cookie::get('auth'));
            $ip = Request::ip();
            $agent = new Agent();
            $platform = $agent->browser() . ":" . $agent->version($agent->browser()) . "\\" . $agent->platform() . ":" . $agent->version($agent->platform());

            $user = User::find($cookie->id);

            if($user === null){
                if(!$passive){
                    return ['success'=>false, 'cookie'=>Cookie::forget('auth'), 'error'=>'Unable to find User!'];
                }
                return ['success'=>false];
            }

            $session = Session::where('auth_id', $cookie->token)->first();

            if($session === null){
                if(!$passive){
                    return ['success'=>false, 'cookie'=>Cookie::forget('auth'), 'error'=>'Unable to find Session'];
                }
                return ['success'=>false];
            }

            if($ip !== $session->ip_address || $platform !== $session->platform){
                if(!$passive){
                    $session->delete();
                    return ['success'=>false, 'cookie'=>Cookie::forget('auth'), 'error'=>'Platform or IP mismatch'];
                }
                return ['success'=>false];
            }

            if(Carbon::now() > $session->expiration){
                if(!$passive) {
                    $session->delete();
                    return ['success'=>false, 'cookie'=>Cookie::forget('auth'), 'error'=>'Session Expired'];
                }
                return ['success'=>false];
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

        foreach(Session::where('user_id', $user->id)->get() as $session){
            $session->delete();
        }

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

    /**
     * @return boolean
     */
    public static function is($role){

        if(!Auth::check(true)['success']){
            return false;
        }

        $role = Role::where('name', $role)->first();

        if($role === null){
            return false;
        }

        $cookie = json_decode(Cookie::get('auth'));

        $user = User::find($cookie->id);

        if($user->role_id == $role->id){
            return true;
        }   
        return false;
    }

    public static function get(){

        if(!Auth::check(true)['success']){
            return null;
        }

        $cookie = json_decode(Cookie::get('auth'));
        return User::find($cookie->id);
    }

    public static function lastSeen($user_id)
    {
        $session = Session::where('user_id', $user_id)->first();
        $date = new Carbon($session->expiration);
        $date->subHours(3);
        return $date->diffForHumans();
    }
}