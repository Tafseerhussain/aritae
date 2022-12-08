<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Chat\Message;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [

        'sender_id',
        'receiver_id',
        'last_time_message',

    ];

    // Relationships
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
