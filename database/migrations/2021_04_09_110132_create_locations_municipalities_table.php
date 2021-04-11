<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations_municipalities', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('location_id');
            $table->tinyInteger('country_id');
            $table->tinyInteger('region_id');
            $table->tinyInteger('district_id');
            $table->string('city_id');
            $table->string('municipality');
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
        Schema::dropIfExists('locations_municipalities');
    }
}
