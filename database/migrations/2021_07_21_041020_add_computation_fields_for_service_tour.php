<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddComputationFieldsForServiceTour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_tour', function (Blueprint $table) {
            //
            $table->integer('max_adult_count')->nullable();
            $table->double('max_adult_price',10,2)->nullable();
            $table->integer('max_children_count')->nullable();
            $table->double('max_children_price',10,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_tour', function (Blueprint $table) {
            //
            $table->dropColumn('max_adult_count');
            $table->dropColumn('max_adult_price');
            $table->dropColumn('max_children_count');
            $table->dropColumn('max_children_price');
        });
    }
}
