<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classes';

    public function subject(){
        return $this->belongsTo('App\Subject');
    }

    public function students(){
        return $this->belongsToMany('App\User', 'classes_students', 'class_id', 'user_id');
    }

    public function teacher(){
        return $this->belongsTo('App\User', 'teacher_id');
    }

    public function news(){
        return $this->belongsToMany('App\News', 'news_classes', 'class_id', 'news_id');
    }
}
