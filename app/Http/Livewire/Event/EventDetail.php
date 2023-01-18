<?php

namespace App\Http\Livewire\Event;

use Livewire\Component;

class EventDetail extends Component
{

    public $event;

    public function mount($event){
        $this->event = $event;
    }

    public function closeEvent(){
        $this->emit('closeEvent');
    }

    public function render()
    {
        return view('livewire.event.event-detail');
    }
}
