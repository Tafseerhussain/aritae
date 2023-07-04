<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Sport;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->foreignIdFor(Sport::class)->nullable();
            $table->string('phone', 191)->nullable();
            $table->boolean('video_session')->default(0);
            $table->boolean('site_session')->default(0);
            $table->string('location', 191)->nullable();
            $table->text('description')->nullable();
            $table->foreignIdFor(User::class)->nullable();
            $table->string('timezone', 191)->nullable();
            $table->text('time_slot')->nullable();
            $table->string('date', 191)->nullable();
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
        Schema::dropIfExists('sessions');
    }
};
