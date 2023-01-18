<?php

namespace App\Http\Livewire\Event;

use Livewire\Component;
use Auth;

class EventDetailPage extends Component
{
    public $event;

    public function eventJoin(){
        if($this->event->type == 'free'){
            $this->event->players()->syncWithoutDetaching(Auth::user()->player->id);
            $this->dispatchBrowserEvent('event_join_notification', [
                'title' => 'Event joining successful',
                'type' => 'info',
                'message' => 'You have successfully joined to the event',
            ]);
        }
        else if($this->event->type == 'paid' && $this->event->price > 0){
            return redirect(route('player.payment'));
        }
    }

    public function render()
    {
        return view('livewire.event.event-detail-page');
    }
}
