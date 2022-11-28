<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player;

class PlayerExperience extends Model
{
    use HasFactory;

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
