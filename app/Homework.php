<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{

    protected $table = 'homework';

    public function submits(){
        return $this->hasMany(Submits::class);
    }

    public function setter(){
        return $this->belongsTo(User::class, 'set_by');
    }

    public function questions(){
        return $this->belongsToMany(Question::class, 'questions_homework', 'homework_id', 'question_id');
    }

    public function classrooms(){
        return $this->belongsToMany(Classroom::class, 'homework_classes', 'homework_id', 'class_id');
    }
}
