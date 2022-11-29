<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_type_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('area_of_focus');
            $table->string('gender');
            $table->unsignedInteger('experience')->nullable();
            $table->unsignedInteger('hourly_rate')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->rememberToken();
            $table->timestamps();

            // COMMON WITH COACHES TABLE
            // Area of focus (sport)
            // gender
            // experience
            // hourly rate
            // address (location)
            // city
            // zip
            // country
            // full name (name)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
