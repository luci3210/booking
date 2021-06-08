<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('pm_id');
            $table->integer('pm_user_id');
            $table->integer('pm_ps_id');
            $table->integer('pm_page_id');
            $table->enum('pm_page_name', ['tour','hotel'])->nullable();
            $table->enum('pm_payment_status', ['success','pending', 'cancelled'])->nullable();
            $table->timestamp('pm_created_at')->nullable();
            $table->timestamp('pm_updated_at')->nullable();
            $table->integer('pm_temp_status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
