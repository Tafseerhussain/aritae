<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;

class GlobalTeamsSingle extends Component
{
    public $team;

    public function closeDetail(){
        $this->emit('closeGlobalTeamDetail');
    }

    public function render()
    {
        return view('livewire.team.global-teams-single');
    }
}
