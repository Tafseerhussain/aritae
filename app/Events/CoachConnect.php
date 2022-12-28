<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class CoachConnect implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $initiator;
    public $receiver;
    public $type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $initiator, User $receiver, $type)
    {
        $this->initiator = $initiator;
        $this->receiver = $receiver;
        $this->type = $type;
    }

    public function broadcastWith()
    {
        return [
            'initiator_id' => $this->initiator->id,
            'initiator_name' => $this->initiator->full_name,
            'receiver_id' => $this->receiver->id,
            'receiver_name' => $this->receiver->full_name,
            'type' => $this->type,
        ];
    }

    public function broadcastOn()
    {
        return new PrivateChannel('coach-connect.'.$this->receiver->id); 
    }
}
