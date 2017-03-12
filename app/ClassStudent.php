<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassStudent extends Model
{
    protected $table = "classes_students";

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function classroom(){
        return $this->belongsTo('App\Classroom', 'class_id');
    }
}
