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
use App\Models\Player;
use App\Models\PlayerPlaybook;

class PlaybookRequest implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $coach;
    public $player;
    public $playbook;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Coach $coach, Player $player, PlayerPlaybook $playbook)
    {
        $this->coach = $coach;
        $this->player = $player;
        $this->playbook = $playbook;
    }

    public function broadcastWith()
    {
        return [
            'coach_name' => $this->coach->name,
            'coach_id' => $this->coach->id,
            'player_name' => $this->player->name,
            'player_id' => $this->player->id,
            'playbook' => $this->playbook->id,
            'type' => 'playbook-requested'
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('playbook-request.'.$this->player->user->id);
    }
}
