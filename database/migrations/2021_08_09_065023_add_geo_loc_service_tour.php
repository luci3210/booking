<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGeoLocServiceTour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_tour', function (Blueprint $table) {
            //
            $table->decimal('lat',12,9,)->nullable();
            $table->decimal('lng',12,9,)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_tour', function (Blueprint $table) {
            //
            $table->dropColumn('lat');
            $table->dropColumn('lng');
        });
    }
}
