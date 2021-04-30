<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFnameAndLnameAndMnameAndGenderAndBdateAndCountryAndPnumberAndAddress1AndAddress2ToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('mname')->nullable();
            $table->string('gender')->nullable();
            $table->tinyInteger('country')->nullable();
            $table->string('pnumber')->nullable();
            $table->string('address')->nullable();
            $table->string('profpic')->nullable();
            $table->string('accnt_nu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn(['fname',  
                    'lname',
                    'mname',
                    'gender',
                    'country',
                    'pnumber',
                    'address',
                    'profpic',
                    'accnt_nu',
                ]);
        });
    }
}
