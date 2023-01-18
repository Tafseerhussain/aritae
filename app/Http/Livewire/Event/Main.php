<?php

namespace App\Http\Livewire\Event;

use Livewire\Component;

class Main extends Component
{
    //Listeners
    protected $listeners = [
        'eventCancelled' => 'eventCancelled',
        'eventCreated' => 'eventCreated',
        'showDetail' => 'eventDetail',
        'showCreateEvent' => 'showCreateEvent',
        'closeEvent' => 'eventClosed',
    ];

    public $activeComponent = 'events';
    public $event = null;

    public function changeComponent($component){
        $this->activeComponent = $component;
    }

    public function eventCancelled(){
        $this->changeComponent('events');
    }

    public function eventClosed(){
        $this->changeComponent('events');
    }

    public function eventCreated(){
        $this->changeComponent('events');
    }

    public function showCreateEvent(){
        $this->changeComponent('create_event');
    }

    public function eventDetail($event){
        $this->event= $event;
        $this->changeComponent('event_detail');
    }

    public function render()
    {
        return view('livewire.event.main');
    }
}
