<?php

namespace App\Http\Livewire\Event;

use Livewire\Component;

class Main extends Component
{
    //Listeners
    protected $listeners = [
        'eventCancelled' => 'eventCancelled',
        'eventCreated' => 'eventCreated'
    ];

    public $activeComponent = 'events';

    public function changeComponent($component){
        $this->activeComponent = $component;
    }

    public function eventCancelled(){
        $this->changeComponent('events');
    }

    public function eventCreated(){
        $this->changeComponent('events');
    }

    public function render()
    {
        return view('livewire.event.main');
    }
}
