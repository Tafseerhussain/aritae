<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
use App\Models\Team;
use Auth;

class PendingTeams extends Component
{
    public $teams = [];

    public function mount(){
        if(Auth::user()->user_type_id == 2)
            $this->teams = Auth::user()->coach->own_teams()->where('status', 'pending')->with('requests')->get();
        if(Auth::user()->user_type_id == 1)
            $this->teams = Team::where('status', 'pending')->get();
    }

    public function approveTeam($id){
        $team = Team::find($id);
        $team->status = 'active';
        $team->save();

        $this->teams = Team::where('status', 'pending')->get();
    }

    public function render()
    {
        return view('livewire.team.pending-teams', ['teams' => $this->teams]);
    }
}
