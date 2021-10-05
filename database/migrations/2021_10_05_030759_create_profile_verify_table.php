<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileVerifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_verify', function (Blueprint $table) {
            $table->id('pv_id');
            $table->unsignedBigInteger('pv_profile_id');
            $table->foreign('pv_profile_id')->references('id')->on('profiles'); 
            $table->tinyInteger('pv_verify_id'); 
            $table->text('pv_message'); 
            $table->timestamp('pv_created');
            $table->timestamp('pv_updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_verify');
    }
}
