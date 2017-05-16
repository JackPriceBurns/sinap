<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassStudent extends Model
{
    protected $table = "classes_students";

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function classroom(){
        return $this->belongsTo(Classroom::class, 'class_id');
    }
}
