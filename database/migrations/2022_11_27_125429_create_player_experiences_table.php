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
        Schema::create('player_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('player_id');
            $table->string('club_name');
            $table->string('position');
            $table->string('team_name');
            $table->string('jersey_number')->nullable();
            $table->string('coach_name')->nullable();
            $table->string('coach_phone')->nullable();
            $table->string('start_month');
            $table->string('start_year');
            $table->string('end_month');
            $table->string('end_year');
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
        Schema::dropIfExists('player_experiences');
    }
};
