<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClassStudentJunctionTable extends Migration
{

    public function up()
    {
        Schema::create('classes_students', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('class_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('classes_students');
    }
}
