<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id('fv_id');
            $table->integer('fv_user_id');
            $table->integer('fv_tour_id');
            $table->integer('fv_service_id')->nullable();
            $table->timestamp('fv_created_at')->nullable();
            $table->timestamp('fv_updated_at')->nullable();
            $table->integer('fv_temp_status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
