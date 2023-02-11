<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\UserType;
use App\Models\Coach;
use App\Models\Player;
use App\Models\Sport;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userType()
    {
        return $this->belongsTo(UserType::class);
    }

    public function coach()
    {
        return $this->hasOne(Coach::class);
    }

    public function parent()
    {
        return $this->hasOne(PlayerParent::class);
    }

    public function player()
    {
        return $this->hasOne(Player::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function sports()
    {
        return $this->belongsToMany(Sport::class);
    }

    public function team_request()
    {
        return $this->hasMany(TeamRequest::class);
    }

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function settings(){
        return $this->hasOne(UserSetting::class);
    }
}
