<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPaymentModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_payment', function (Blueprint $table) {
            $table->id('ps_id');
            $table->integer('ps_user_id');
            $table->enum('ps_page_name', ['tour','hotel'])->nullable();
            $table->text('ps_merchant_id')->nullable();
            $table->text('ps_traxion_id')->nullable();
            $table->text('ps_merchant_ref_no')->nullable();
            $table->text('ps_ref_no')->nullable();
            $table->text('ps_payment_status')->nullable();
            $table->text('ps_reason')->nullable();
            $table->text('ps_description')->nullable();
            $table->text('ps_extra_data')->nullable();
            $table->text('ps_payment_code')->nullable();
            $table->text('ps_payment_method')->nullable();
            $table->text('ps_secure_hash')->nullable();
            $table->timestamp('ps_created_at')->nullable();
            $table->timestamp('ps_updated_at')->nullable();
            $table->integer('ps_temp_status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_payment');
    }
}
