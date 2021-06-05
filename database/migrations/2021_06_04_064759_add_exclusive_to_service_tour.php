<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExclusiveToServiceTour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_tour', function (Blueprint $table) {
            $table->string('exclusive_price',12);
            $table->string('exclusive_date_start',12);
            $table->string('exclusive_date_end',12);
            $table->integer('exclusive_confirmed');
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
            $table->dropColumn(['exclusive_price','exclusive_date_start','exclusive_date_end','exclusive_confirmed']);
        });
    }
}
