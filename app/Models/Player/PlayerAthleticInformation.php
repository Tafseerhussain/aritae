<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player;

class PlayerAthleticInformation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
