<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('price');
            $table->string('nonight');
            $table->string('roomname');
            $table->string('roomdesc');
            $table->string('roomsize');
            $table->string('viewdeck');
            $table->string('noguest');
            $table->string('nobed');
            $table->string('profid');
            $table->string('serviceid');
            $table->string('temp_status');
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
        Schema::dropIfExists('hotels');
    }
}
