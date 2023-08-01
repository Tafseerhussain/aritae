<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Coach;
use App\Models\User;

class CoachApplicationSubmission implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $coach;
    public $admin;
    public $type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Coach $coach, User $admin, $type)
    {
        $this->coach = $coach;
        $this->admin = $admin;
        $this->type = $type;
    }

    public function broadcastWith()
    {
        return [
            'coach_name' => $this->coach->name,
            'admin_id' => $this->admin->id,
            'admin_name' => $this->admin->full_name,
            'type' => $this->type,
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('admin-notification.'.$this->admin->id);
    }
}
