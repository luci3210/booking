<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargesDateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges_date', function (Blueprint $table) {
            $table->id('chg_id');
            $table->integer('chg_ps_id');
            $table->integer('chg_prf_id');
            $table->integer('chg_confirm_no');
            $table->string('chg_date');
            $table->integer('chg_temp'); 
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
        Schema::dropIfExists('charges_date');
    }
}
