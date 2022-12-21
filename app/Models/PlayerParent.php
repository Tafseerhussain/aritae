<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerParent extends Model
{
    use HasFactory;

    protected $table = 'parents';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function players()
    {
        return $this->belongsToMany(Player::class, 'parent_player', 'parent_id', 'player_id');
    }
}
