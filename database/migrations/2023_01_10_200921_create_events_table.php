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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('coach_id')->nullable();
            $table->string('name', 255);
            $table->date('start');
            $table->date('end');
            $table->string('city');
            $table->string('state');
            $table->text('url')->nullable();
            $table->string('type');
            $table->float('price')->nullable();
            $table->text('description');
            $table->string('cover_image');
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
        Schema::dropIfExists('events');
    }
};
