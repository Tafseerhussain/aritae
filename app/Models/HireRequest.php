<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player;
use App\Models\Coach;

class HireRequest extends Model
{
    use HasFactory;

    public function players()
    {
        $this->belongsToMany(Player::class);
    }
    public function coaches()
    {
        $this->belongsToMany(Coach::class);
    }
}
