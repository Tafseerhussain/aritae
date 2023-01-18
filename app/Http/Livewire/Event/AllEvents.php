<?php

namespace App\Http\Livewire\Event;

use Livewire\Component;
use App\Models\Event;

class AllEvents extends Component
{
    public $events;
    public $sort = 'name';

    public function mount(){
        $this->events = Event::where('status', 'active')->get();
    }

    public function sortEvents(){
        $this->events->sortBy($this->sort);
    }

    public function render()
    {
        return view('livewire.event.all-events', [
            'events' => $this->events
        ]);
    }
}
