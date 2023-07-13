<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachParticipation extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach_id',
        'question1',
        'question2',
        'question3',
        'question4',
        'question5',
        'question6',
        'question7',
        'question8',
        'question9',
        'question10',
        'question11',
        'question12',
        'question13',
        'question14_1',
        'question14_2',
        'question14_3',
        'question15',
        'question16_1',
        'question16_2',
    ];

    public function coach(){
        return $this->belongsTo(Coach::class);
    }
}
