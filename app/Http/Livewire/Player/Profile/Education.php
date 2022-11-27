<?php

namespace App\Http\Livewire\Player\Profile;

use Livewire\Component;
use App\Models\Player\PlayerEducation;
use Auth;

class Education extends Component
{
    public $institutionName;
    public $degreeTitle;
    public $startingMonth = '';
    public $startingYear = '';
    public $endingMonth = '';
    public $endingYear = '';

    public $editSave = 1;
    public $editRecord;
    public $deleteRecord;

    public function hideMessage()
    {
        session()->forget('success_message');
    }

    public function render()
    {
        return view('livewire.player.profile.education',  [
            'education' => PlayerEducation::where('player_id', Auth::user()->player->id)->get(),
        ]);
    }
}
