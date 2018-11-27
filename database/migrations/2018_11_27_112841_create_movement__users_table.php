<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovementUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movement_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('movement_id');
            $table->unsignedInteger('user_id')->unique();

            $table->foreign('movement_id')
                ->references('id')
                ->on('movements')
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
        Schema::dropIfExists('movement_users');
    }
}
