<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income', function (Blueprint $table) {
            $table->id('mi_id');
            $table->integer('mi_service_id');
            $table->integer('mi_payment_id');
            $table->integer('mi_payment_status_id');
            $table->decimal('mi_paid_amount',9,2);
            $table->integer('mi_tourismo_charge');
            $table->decimal('mi_tourismo_income',9,2);
            $table->decimal('mi_merchant_income',9,2);
            $table->integer('mi_merchant_prof_id');
            $table->integer('mi_tourismo_prof_id');
            $table->integer('mi_exec_user_id');
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
        Schema::dropIfExists('income');
    }
}
