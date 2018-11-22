<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('url');
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
        Schema::dropIfExists('posts_links');
    }
}
