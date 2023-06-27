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
use App\Models\ContactResponse;

class ContactFormSubmission implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $contact_response;
    public $admin;
    public $type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ContactResponse $response, User $admin, $type)
    {
        $this->contact_response = $response;
        $this->admin = $admin;
        $this->type = $type;
    }

    public function broadcastWith()
    {
        return [
            'contact_name' => $this->contact_response->first_name." ".$this->contact_response->last_name,
            'contact_email' => $this->contact_response->email,
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
