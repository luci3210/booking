<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booked_menu', function (Blueprint $table) {
            $table->id();
            $table->string('name',50)->unique();
            $table->string('slog',50)->unique();
            $table->tinyInteger('access');
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
        Schema::dropIfExists('booked_menu');
    }
}
