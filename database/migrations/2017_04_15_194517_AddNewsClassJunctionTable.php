<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewsClassJunctionTable extends Migration
{
    public function up()
    {
        Schema::create('news_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_id');
            $table->integer('news_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('news_classes');
    }
}
