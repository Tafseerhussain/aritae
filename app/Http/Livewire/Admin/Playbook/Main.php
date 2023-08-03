<?php

namespace App\Http\Livewire\Admin\Playbook;

use Livewire\Component;

class Main extends Component
{
    protected $listeners = [
        'viewPlaybook',
        'back'
    ];

    public $coach_id = null;
    public $active_component = 'players';
    public $playbook_id;

    public function mount($coach_id){
        $this->coach_id = $coach_id;
    }

    public function viewPlaybook($playbook_id){
        $this->playbook_id = $playbook_id;
        $this->active_component = 'playbook-view';
    }

    public function back(){
        $this->active_component = 'players';
    }

    public function render()
    {
        return view('livewire.admin.playbook.main');
    }
}
