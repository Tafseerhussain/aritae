<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CoachingExperience;
use App\Models\CoachCertification;
use App\Models\CoachEducation;
use App\Models\CoachVideo;
use App\Models\Player;

class Coach extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function experiences()
    {
        return $this->hasMany(CoachingExperience::class);
    }

    public function certificates()
    {
        return $this->hasMany(CoachCertification::class);
    }

    public function educations()
    {
        return $this->hasMany(CoachEducation::class);
    }

    public function videos()
    {
        return $this->hasMany(CoachVideo::class);
    }

    public function players()
    {
        return $this->belongsToMany(Player::class);
    }
}
