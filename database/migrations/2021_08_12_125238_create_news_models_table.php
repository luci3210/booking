<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id('news_id');
            $table->integer('news_user_id');
            $table->integer('news_user_id_last_edit');
            $table->text('news_title');
            $table->text('news_body');
            $table->text('news_source');
            $table->text('news_img_cover');
            $table->timestamp('news_created_at')->nullable();
            $table->timestamp('news_updated_at')->nullable();
            $table->integer('news_temp_status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
