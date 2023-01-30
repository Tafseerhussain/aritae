<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'coach_id',
        'name',
        'sport',
        'logo',
        'cover',
        'status'
    ];

    public function creator(){
        return $this->belongsTo(Coach::class, 'coach_id', 'id');
    }
    
    public function requests(){
        return $this->hasMany(TeamRequest::class);
    }

    public function players(){
        return $this->belongsToMany(Player::class)->withPivot('position', 'jersey');
    }

    public function coaches(){
        return $this->belongsToMany(Coach::class);
    }

    public function events(){
        return $this->belongsToMany(Event::class)->withPivot('played', 'won', 'lost', 'points');
    }
}
