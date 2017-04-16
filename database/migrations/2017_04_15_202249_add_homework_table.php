<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHomeworkTable extends Migration
{

    public function up()
    {
        Schema::create('homework', function (Blueprint $table) {
            $table->increments('id');
            $table->date('due');
            $table->integer('set_by');
            $table->string('name');
            $table->string('heads_up');
            $table->integer('subject_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('homework');
    }
}
