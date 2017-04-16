<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPartsTable extends Migration
{

    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['mp', 'a']);
            $table->integer('question_id');
            $table->string('question');
            $table->string('tip');
            $table->string('answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parts');
    }
}
