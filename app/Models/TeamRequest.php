<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'user_id',
        'user_type',
        'position',
        'jersey',
    ];

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
