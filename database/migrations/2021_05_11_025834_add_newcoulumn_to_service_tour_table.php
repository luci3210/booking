<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewcoulumnToServiceTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_tour', function (Blueprint $table) {
            $table->string('room_facilities')->nullable();
            $table->string('building_facilities')->nullable();
            $table->string('booking_package')->nullable();
            $table->tinyInteger('country')->nullable();
            $table->tinyInteger('region')->nullable();
            $table->tinyInteger('district')->nullable();
            $table->tinyInteger('city')->nullable();
            $table->tinyInteger('municipality')->nullable();
            $table->tinyInteger('barangay')->nullable();
            $table->tinyInteger('address_id')->nullable();
            $table->string('pay_method')->nullable();
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
            $table->dropColumn(['room_facilities',  
                    'building_facilities', 
                    'booking_package',
                    'country',
                    'region',
                    'district',
                    'city',
                    'municipality',
                    'barangay',
                    'address_id',
                    'pay_method'
                     ]);
        });
    }
}
