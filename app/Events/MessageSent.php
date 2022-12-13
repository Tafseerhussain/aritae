<?php

namespace App\Events;

use App\Models\Chat\Conversation;
use App\Models\Chat\Message;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $message;
    public $conversation;
    public $receiver;

    public function __construct(User $user, Message $message, Conversation $conversation, User $receiver)
    {
        $this->user = $user;
        $this->message = $message;
        $this->conversation = $conversation;
        $this->receiver = $receiver;
    }

    public function broadcastWith()
    {
        return [
            'user_id' => $this->user->id,
            'message' => $this->message->id,
            'conversation_id' => $this->conversation->id,
            'receiver_id' => $this->receiver->id,
            'message_body' => $this->message->body,
            'user_name' => $this->user->full_name,
            'receiver_name' => $this->receiver->full_name, 
        ];
    }

    public function broadcastOn()
    {
        error_log($this->user);
        error_log($this->receiver);
        return new PrivateChannel('chat.'.$this->receiver->id); 
    }
}
