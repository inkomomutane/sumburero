<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('published')->nullable()->default(false);
            $table->unsignedBigInteger('category_id')->index('fk_posts_categories1_idx');
            $table->unsignedBigInteger('author_id')->index('fk_posts_users1_idx');
            $table->timestamps(6);
            $table->string('resume')->nullable();
            $table->string('keywords');
            $table->string('cover_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
