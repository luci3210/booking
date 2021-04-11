<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsBarangayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations_barangay', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('location_id');
            $table->tinyInteger('country_id');
            $table->tinyInteger('region_id');
            $table->tinyInteger('district_id');
            $table->tinyInteger('city_id');
            $table->tinyInteger('municipality_id');
            $table->string('barangay');
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
        Schema::dropIfExists('locations_barangay');
    }
}
