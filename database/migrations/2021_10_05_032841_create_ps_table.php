<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_services', function (Blueprint $table) {
            $table->id('ps_id');
            $table->unsignedBigInteger('ps_profile_id');
            $table->foreign('ps_profile_id')->references('id')->on('profiles');   
            $table->unsignedBigInteger('ps_service_id');                                   
            $table->foreign('ps_service_id')->references('id')->on('products');                   
            $table->string('ps_name',100);
            $table->text('ps_description');
            $table->text('ps_address');
            $table->bigInteger('ps_country');
            $table->bigInteger('ps_district');
            $table->bigInteger('ps_city');
            $table->text('ps_facilities');
            $table->text('ps_roles_desc');
            $table->text('ps_attraction');
            $table->text('ps_cancelaton_ref');
            $table->text('ps_check_in_out');
            $table->tinyInteger('ps_temp');
            $table->decimal('ps_lat',12,9)->nullable();
            $table->decimal('ps_lng',12,9)->nullable();
            $table->timestamp('ps_created');
            $table->timestamp('ps_updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_services');
    }
}
