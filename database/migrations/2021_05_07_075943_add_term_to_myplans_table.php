<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTermToMyplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('myplans', function (Blueprint $table) {
            $table->tinyInteger('terms');
            $table->string('validity',25);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('myplans', function (Blueprint $table) {
            $table->dropColumn('terms');
            $table->dropColumn('validity');
        });
    }
}
