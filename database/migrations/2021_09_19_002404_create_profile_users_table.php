<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_users', function (Blueprint $table) {
            $table->id('pu_id');
            $table->integer('up_profile_id');
            $table->integer('up_user_id')->unique();
            $table->integer('up_role_id');
            $table->integer('pu_temp');
            $table->timestamp('pu_created_at');
            $table->timestamp('pu_updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_users');
    }
}
