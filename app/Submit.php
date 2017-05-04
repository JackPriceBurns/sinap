<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function homework(){
        return $this->belongsTo('App\Homework');
    }
}
