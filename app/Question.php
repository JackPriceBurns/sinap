<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function parts(){
        return $this->hasMany(Part::class);
    }

    public function homework(){
        return $this->belongsToMany(Homework::class, 'questions_homework', 'question_id', 'homework_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'questions_tags', 'question_id', 'tag_id');
    }
}
