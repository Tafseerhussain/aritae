<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Player\PlayerAthleticInformation;
use App\Models\Player\PlayerCertification;
use App\Models\Player\PlayerEducation;
use App\Models\Player\PlayerExperience;
use App\Models\Player\PlayerVideo;
use App\Models\Coach;
use App\Models\HireRequest;

class Player extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function athleticInfo()
    {
        return $this->hasMany(PlayerAthleticInformation::class);
    }

    public function certificates()
    {
        return $this->hasMany(PlayerCertification::class);
    }

    public function educations()
    {
        return $this->hasMany(PlayerEducation::class);
    }

    public function experiences()
    {
        return $this->hasMany(PlayerExperience::class);
    }

    public function videos()
    {
        return $this->hasMany(PlayerVideo::class);
    }

    public function coaches()
    {
        return $this->belongsToMany(Coach::class);
    }

    public function parents()
    {
        return $this->belongsToMany(PlayerParent::class, 'parent_player', 'player_id', 'parent_id');
    }

    public function requests()
    {
        return $this->belongsToMany(HireRequest::class);
    }
}
