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
        'price',
        'description',
        'cover_image',
        'coach_id',
    ];

    public function coach(){
        return $this->belongsTo(Coach::class);
    }
}
