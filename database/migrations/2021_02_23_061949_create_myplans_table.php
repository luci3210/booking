<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myplans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('plan_auth');
            $table->string('plan_key');
            $table->string('plan_name');
            $table->string('plan_price');
            $table->string('plan_list');
            $table->string('paid_curency');
            $table->string('expired');
            $table->integer('temp_status');
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
        Schema::dropIfExists('myplans');
    }
}
