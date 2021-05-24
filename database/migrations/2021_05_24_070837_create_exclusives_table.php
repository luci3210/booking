<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExclusivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exclusives', function (Blueprint $table) {
            $table->id();
            $table->integer('merchant_id');
            $table->string('exclusive_info',200);
            $table->string('exclusive_desc',300);
            $table->tinyInteger('for_home');
            $table->tinyInteger('for_approve');
            $table->string('exclusive_image',250);
            $table->tinyInteger('temp_status');
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
        Schema::dropIfExists('exclusives');
    }
}
