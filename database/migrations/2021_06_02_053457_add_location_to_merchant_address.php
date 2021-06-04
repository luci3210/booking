<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocationToMerchantAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchant_address', function (Blueprint $table) {
            $table->integer('country_id');
            $table->integer('region_id');
            $table->integer('district_id');
            $table->integer('city_id');
            $table->integer('municipality_id');
            $table->integer('barangay_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchant_address', function (Blueprint $table) {
            $table->dropColumn(['country_id','region_id','district_id','city_id','municipality_id','barangay_id']);
        });
    }
}
