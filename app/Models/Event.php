<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start',
        'end',
        'city',
        'state',
        'url',
        'type',
        'status',
        'price',
        'description',
        'cover_image',
        'coach_id',
    ];

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function players()
    {
        return $this->belongsToMany(Player::class);
    }

    public function teams(){
        return $this->belongsToMany(Team::class)->withPivot('played', 'won', 'lost', 'points');
    }
}
