<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTribeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tribe_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tribe_id');
            $table->unsignedInteger('user_id')->unique();

            $table->foreign('tribe_id')
                ->references('id')
                ->on('tribes')
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
        Schema::dropIfExists('tribe_users');
    }
}
