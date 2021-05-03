<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentCredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_creds', function (Blueprint $table) {
            $table->id();
            $table->string('api_name',100);
            $table->string('private_key',350)->nullable();
            $table->string('public_key',350)->nullable();
            $table->string('merchant_id',90)->nullable();
            $table->string('merchant_name',100)->nullable();
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
        Schema::dropIfExists('payment_creds');
    }
}
