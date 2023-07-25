<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerPlaybook extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach_id',
        'player_id',
        'status',
        'response',
    ];

    public function player(){
        return $this->belongsTo(Player::class);
    }

    public function coach(){
        return $this->belongsTo(Coach::class);
    }
}
