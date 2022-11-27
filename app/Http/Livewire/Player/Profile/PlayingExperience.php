<?php

namespace App\Http\Livewire\Player\Profile;

use Livewire\Component;
use Auth;
use App\Models\Player\PlayerExperience;

class PlayingExperience extends Component
{
    public $clubName;
    public $position;
    public $teamName;
    public $jerseyNumber;

    public $startingMonth = '';
    public $startingYear = '';
    public $endingMonth = '';
    public $endingYear = '';

    public $coachName;
    public $coachPhone;

    public $editSave = 1;
    public $editRecord;
    public $deleteRecord;

    public function hideMessage()
    {
        session()->forget('success_message');
    }

    public function render()
    {
        return view('livewire.player.profile.playing-experience', [
            'experiences' => PlayerExperience::where('player_id', Auth::user()->player->id)->get(),
        ]);
    }
}
