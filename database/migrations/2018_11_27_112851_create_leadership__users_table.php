<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadershipUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leadership_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('leadership_id');
            $table->unsignedInteger('user_id')->unique();

            $table->foreign('leadership_id')
                ->references('id')
                ->on('leaderships')
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
        Schema::dropIfExists('leadership_users');
    }
}
