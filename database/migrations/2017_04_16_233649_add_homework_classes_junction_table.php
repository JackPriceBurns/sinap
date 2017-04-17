<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHomeworkClassesJunctionTable extends Migration
{
    public function up()
    {
        Schema::create('homework_classes', function (Blueprint $table) {
            $table->integer('class_id');
            $table->integer('homework_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('homework_classes');
    }
}
