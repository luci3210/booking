<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeWithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_withdrawals', function (Blueprint $table) {
            
            $table->id('iw_id');
            $table->integer('iw_withdraw_profid');
            $table->integer('iw_withdraw_bank_account_id');
            $table->decimal('iw_withdraw_balane',9,2);
            $table->decimal('iw_withdraw_amount',9,2);
            $table->string('iw_reference_no');
            $table->string('iw_reference_attach');
            $table->string('iw_process_by');
            $table->string('iw_approve_by');
            $table->integer('iw_temp');
            $table->timestamp('iw_created_at');
            $table->timestamp('iw_updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('income_withdrawals');
    }
}
