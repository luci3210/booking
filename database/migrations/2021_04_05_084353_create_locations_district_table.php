<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations_district', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('location_id');
            $table->tinyInteger('country_id');
            $table->string('region_id');
            $table->string('district');
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
        Schema::dropIfExists('locations_district');
    }
}
