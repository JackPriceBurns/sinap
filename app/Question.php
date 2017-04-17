<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function parts(){
        return $this->hasMany('App\Part');
    }

    public function homework(){
        return $this->belongsToMany('App\Homework', 'questions_homework', 'question_id', 'homework_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag', 'questions_tags', 'question_id', 'tag_id');
    }
}
