<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuestionsTagsJunctionTable extends Migration
{
    public function up()
    {
        Schema::create('questions_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id');
            $table->integer('tag_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions_tags');
    }
}
