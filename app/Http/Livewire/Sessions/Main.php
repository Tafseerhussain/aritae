<?php

namespace App\Http\Livewire\Sessions;

use Livewire\Component;

class Main extends Component
{
    protected $listeners = [
        'createSession', 
        'scheduleSession', 
        'sessionCreated', 
        'joinSession',
        'sessionCoachJoined',
        'editSession',
        'sessionUpdated',
        'rescheduleSession',
        'scheduleUpdated',
    ];

    public $activeComponent = 'my_sessions';
    public $session_data = [];
    public $confirm_session_data = [];
    public $session_id = null;

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

    public function joinSession($data){
        $this->session_id = $data;
        $this->activeComponent = 'confirm_join';
    }

    public function sessionCoachJoined(){
        $this->activeComponent = 'my_sessions';
    }

    public function editSession($id){
        $this->session_id = $id;
        $this->activeComponent = 'edit_session';
    }

    public function sessionUpdated(){
        $this->activeComponent = 'my_sessions';
    }

    public function rescheduleSession($id){
        $this->session_id = $id;
        $this->activeComponent = 'edit_schedule';
    }
    public function scheduleUpdated(){
        $this->activeComponent = 'my_sessions';
    }

    public function render()
    {
        return view('livewire.sessions.main');
    }
}
