<?php

namespace App;

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
}
