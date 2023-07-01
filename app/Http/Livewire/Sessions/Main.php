<?php

namespace App\Http\Livewire\Sessions;

use Livewire\Component;

class Main extends Component
{
    public $activeComponent = 'sessions';

    public function changeComponent($component){
        $this->activeComponent = $component;
    }

    public function render()
    {
        return view('livewire.sessions.main');
    }
}
