<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class add_badge_table extends Migration
{
    public function up()
    {
        Schema::create('badges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id');
            $table->string('colour')->default('warning');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('badges');
    }
}
