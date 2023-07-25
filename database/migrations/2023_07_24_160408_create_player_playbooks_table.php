<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Coach;
use App\Models\Player;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_playbooks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Coach::class);
            $table->foreignIdFor(Player::class);
            $table->string('status', 100)->default('requested');
            $table->longText('response')->nullable();
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
        Schema::dropIfExists('player_playbooks');
    }
};
