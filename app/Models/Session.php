<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sport_id',
        'phone',
        'video_session',
        'site_session',
        'location',
        'description',
        'timezone',
        'time_slot',
        'date',
        'user_id',
    ];

    public function host(){
        return $this->belongsTo(User::class);
    }
    public function sport(){
        return $this->belongsTo(Sport::class);
    }
    public function coaches(){
        return $this->belongsToMany(Coach::class);
    }
}
