<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('auth_id');
            $table->string('ip_address');
            $table->string('platform');
            $table->timestamp('expiration');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
