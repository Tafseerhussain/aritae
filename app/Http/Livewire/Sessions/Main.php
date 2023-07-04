<?php

namespace App\Http\Livewire\Sessions;

use Livewire\Component;

class Main extends Component
{
    protected $listeners = ['createSession', 'scheduleSession', 'sessionCreated'];

    public $activeComponent = 'my_sessions';
    public $session_data = [];
    public $confirm_session_data = [];

    public function changeComponent($component){
        $this->activeComponent = $component;
    }

    public function createSession($data){
        $this->session_data = $data;
        $this->activeComponent = 'schedule_session';
    }

    public function scheduleSession($data){
        $this->confirm_session_data = $data;
        $this->activeComponent = 'confirm_schedule';
    }

    public function sessionCreated(){
        $this->activeComponent = 'my_sessions';
    }

    public function render()
    {
        return view('livewire.sessions.main');
    }
}
