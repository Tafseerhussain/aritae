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
        Schema::create('coach_player', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->id();

            $table->integer('coach_id')->unsigned();
            $table->integer('player_id')->unsigned();

            $table->foreign('coach_id')->references('id')->on('coaches');
            $table->foreign('player_id')->references('id')->on('players');

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
        Schema::dropIfExists('coach_player');
    }
};
