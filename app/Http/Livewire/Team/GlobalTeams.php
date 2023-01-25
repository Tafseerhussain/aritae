<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
use App\Models\Team;

class GlobalTeams extends Component
{
    public $teams;

    public function mount(){
        $this->teams = Team::where('status', 'active')->get();
    }
    
    public function render()
    {
        return view('livewire.team.global-teams');
    }
}
