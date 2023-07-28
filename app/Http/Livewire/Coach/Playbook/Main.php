<?php

namespace App\Http\Livewire\Coach\Playbook;

use Livewire\Component;

class Main extends Component
{
    protected $listeners = [
        'viewPlaybook',
        'back'
    ];

    public $active_component = 'players';
    public $playbook_id;

    public function viewPlaybook($playbook_id){
        $this->playbook_id = $playbook_id;
        $this->active_component = 'playbook-view';
    }

    public function back(){
        $this->active_component = 'players';
    }

    public function render()
    {
        return view('livewire.coach.playbook.main');
    }
}
