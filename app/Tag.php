<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;

    public function questions(){
        return $this->belongsToMany(Question::class, 'questions_tags', 'tag_id', 'question_id');
    }
}
