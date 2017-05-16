<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    public function poster(){
        return $this->belongsTo(User::class, 'posted_by');
    }

    public function classes(){
        return $this->belongsToMany(User::class, 'news_classes', 'news_id', 'class_id');
    }
}
