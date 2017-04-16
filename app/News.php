<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    public function poster(){
        return $this->belongsTo('App\User', 'posted_by');
    }

    public function classes(){
        return $this->belongsToMany('App\User', 'news_classes', 'news_id', 'class_id');
    }
}
