<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Coach;

class CoachEducation extends Model
{
    use HasFactory;

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
