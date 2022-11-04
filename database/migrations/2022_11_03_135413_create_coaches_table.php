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
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->unsignedInteger('rating');
            $table->text('location');
            $table->text('profile_img');
            $table->text('cover_img');
            $table->string('sport');
            $table->string('gender');
            $table->unsignedInteger('experience');
            $table->unsignedInteger('hourly_rate');
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
        Schema::dropIfExists('coaches');
    }
};
