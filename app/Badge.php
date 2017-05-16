<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    public function user(){
        $this->belongsTo(User::class);
    }
}
