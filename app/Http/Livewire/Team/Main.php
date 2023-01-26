<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
use App\Models\Team;
use Auth;

class Main extends Component
{
    public $activeComponent = 'my_teams';
    public $team;

    protected $listeners = [
        'teamCreated' => 'teamCreated',
        'openGlobalTeamDetail' => 'openGlobalTeamDetail',
        'closeGlobalTeamDetail' => 'closeGlobalTeamDetail',
    ];

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

    public function openGlobalTeamDetail($team){
        $this->team = Team::find($team);
        $this->activeComponent = 'global_team_detail';
    }

    public function closeGlobalTeamDetail(){
        $this->activeComponent = 'global_teams';
    }

    public function render()
    {
        return view('livewire.team.main');
    }
}
