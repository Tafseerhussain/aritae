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
        Schema::create('player_certifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('player_id');
            $table->string('certificate_name');
            $table->string('association');
            $table->string('certification_year');
            $table->text('certificate');
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
        Schema::dropIfExists('player_certifications');
    }
};
