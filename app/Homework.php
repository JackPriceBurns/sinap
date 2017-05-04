<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{

    protected $table = 'homework';

    public function submits(){
        return $this->hasMany('App\Submits');
    }

    public function questions(){
        return $this->belongsToMany('App\Question', 'questions_homework', 'homework_id', 'question_id');
    }

    public function classrooms(){
        return $this->belongsToMany('App\Classroom', 'homework_classes', 'homework_id', 'class_id');
    }
}
