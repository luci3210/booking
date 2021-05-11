<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTourPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_tour_photos', function (Blueprint $table) {
            $table->id();
            $table->integer('merchant_id');
            $table->integer('upload_id');
            $table->string('photo')->nullable();
            $table->tinyInteger('temp_status')->default('1');
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
        Schema::dropIfExists('service_tour_photos');
    }
}
