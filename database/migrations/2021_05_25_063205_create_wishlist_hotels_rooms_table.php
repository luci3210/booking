<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistHotelsRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlist_hotels_rooms', function (Blueprint $table) {
            $table->id('wh_id');
            $table->integer('wh_user_id');
            $table->integer('wh_hotel_id');
            $table->timestamp('wh_created_at')->nullable();
            $table->timestamp('wh_updated_at')->nullable();
            $table->integer('wh_temp_status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wishlist_hotels_rooms');
    }
}
