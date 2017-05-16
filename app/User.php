<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function submitted(){
        return $this->hasMany(Submit::class);
    }

    public function sessions(){
        return $this->hasMany(Session::class);
    }

    public function badges(){
        return $this->hasMany(Badge::class);
    }

    public function notifications(){
        return $this->hasMany(Notification::class);
    }

    public function classes(){
        return $this->belongsToMany(Classroom::class, 'classes_students', 'user_id', 'class_id');
    }

    public function teaching(){
        return $this->hasMany(Classroom::class, 'teacher_id');
    }
}
