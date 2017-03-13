<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function sessions(){
        return $this->hasMany('App\Session');
    }

    public function badges(){
        return $this->hasMany('App\Badge');
    }

    public function notifications(){
        return $this->hasMany('App\Notification');
    }

    public function classes(){
        return $this->belongsToMany('App\Classroom', 'classes_students', 'class_id', 'user_id');
    }

    public function teaching(){
        return $this->hasMany('App\Classroom', 'teacher_id', 'id');
    }

    public function lastSeen(){
        $session = Session::where('user_id', $this->id)->orderBy('expiration', 'desc')->first();
        if($session == null){
            return 'never';
        }

        $date = new Carbon($session->expiration);
        $date->subHours(3);
        return $date->diffForHumans();
    }
}
