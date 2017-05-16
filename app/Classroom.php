<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classes';

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function students(){
        return $this->belongsToMany(User::class, 'classes_students', 'class_id', 'user_id');
    }

    public function teacher(){
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function news(){
        return $this->belongsToMany(News::class, 'news_classes', 'class_id', 'news_id');
    }

    public function homework(){
        return $this->belongsToMany(Homework::class, 'homework_classes', 'class_id', 'homework_id');
    }

    public function submits(){
        return $this->hasMany(Submit::class);
    }
}
