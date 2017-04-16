<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewsTable extends Migration
{

    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('posted_by');
            $table->string('link')->nullable();
            $table->string('title');
            $table->string('body');
            $table->enum('dashboard', ['true', 'false']);
            $table->enum('icon', ['calender','pencil', 'link']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
}
