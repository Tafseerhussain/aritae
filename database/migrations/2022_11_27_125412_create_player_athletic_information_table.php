<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_athletic_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('player_id');
            $table->integer('height_ft')->integer();
            $table->integer('height_inch')->integer();
            $table->integer('weight')->integer();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_athletic_information');
    }
};
