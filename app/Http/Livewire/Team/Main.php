<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
use Auth;

class Main extends Component
{
    public $activeComponent = 'my_teams';

    protected $listeners = ['teamCreated' => 'teamCreated'];

    public function mount(){
        if(Auth::user()->user_type_id == 1)
            $this->activeComponent = 'global_teams';
        else
            $this->activeComponent = 'my_teams';
    }

    public function changeComponent($component){
        $this->activeComponent = $component;
    }

    public function teamCreated(){
        $this->activeComponent = 'my_teams';
    }

    public function render()
    {
        return view('livewire.team.main');
    }
}
