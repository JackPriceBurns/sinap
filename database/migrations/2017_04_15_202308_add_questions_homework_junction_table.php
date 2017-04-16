<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuestionsHomeworkJunctionTable extends Migration
{

    public function up()
    {
        Schema::create('questions_homework', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('homework_id');
            $table->integer('question_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions_homework');
    }
}
