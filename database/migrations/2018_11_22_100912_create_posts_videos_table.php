<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->string('thumbnail');
            $table->unsignedInteger('post_id');
//            $table->timestamps();

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_videos');
    }
}
