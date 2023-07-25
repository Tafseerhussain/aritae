<?php

namespace App\Http\Livewire\Coach\Playbook;

use Livewire\Component;

class Main extends Component
{
    public $active_component = 'players';

    public function render()
    {
        return view('livewire.coach.playbook.main');
    }
}
