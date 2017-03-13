<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classes';

    public function subject(){
        $this->belongsTo('App\Subject');
    }

    public function students(){
        return $this->belongsToMany('App\User', 'classes_students', 'user_id', 'class_id');
    }

    public function teacher(){
        return $this->belongsTo('App\User', 'teacher_id');
    }
}
