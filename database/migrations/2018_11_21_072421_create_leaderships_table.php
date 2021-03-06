<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaderships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('movement_id');
            $table->timestamps();

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
        Schema::dropIfExists('leadership');
    }
}
