<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageReviewsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_reviews', function (Blueprint $table) {
            $table->id('pr_id');
            $table->integer('pr_user_id');
            $table->integer('pr_page_id');
            $table->text('pr_review');
            $table->integer('pr_ratings');
            $table->enum('pr_page_name', ['tour','hotel'])->nullable();
            $table->timestamp('pr_created_at')->nullable();
            $table->timestamp('pr_updated_at')->nullable();
            $table->integer('pr_temp_status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_reviews');
    }
}
