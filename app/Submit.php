<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function homework(){
        return $this->belongsTo(Homework::class);
    }
}
