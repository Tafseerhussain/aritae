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

    public function submit()
    {
        $this->validate([
            'clubName' => 'required',
            'position' => 'required',
            'teamName' => 'required',
            'jerseyNumber' => 'required',

            'startingMonth' => 'required',
            'startingYear' => 'required',
            'endingMonth' => 'required',
            'endingYear' => 'required',
        ]);

        if ($this->editSave == 1) {
            $exp = new PlayerExperience;
            $exp->player_id = Auth::user()->player->id;
        }
        if ($this->editSave == 2) {
            $exp = PlayerExperience::find($this->editRecord);
        }

        $exp->club_name = $this->clubName;
        $exp->position = $this->position;
        $exp->team_name = $this->teamName;
        $exp->jersey_number = $this->jerseyNumber;

        $exp->start_month = $this->startingMonth;
        $exp->start_year = $this->startingYear;
        $exp->end_month = $this->endingMonth;
        $exp->end_year = $this->endingYear;

        $exp->coach_name = $this->coachName;
        $exp->coach_phone = $this->coachPhone;

        $exp->save();

        
        if ($this->editSave == 1) {
            $this->reset();
            session()->flash('success_message', 'Experience Added.');
        }
        elseif ($this->editSave == 2) {
            $this->reset();
            session()->flash('success_message', 'Experience Updated.');
        }
    }

    public function updateEditSave($id)
    {
        $this->editSave = $id;
        $this->reset();
    }

    public function editExperience($id)
    {
        $exp = PlayerExperience::find($id);

        $this->clubName = $exp->club_name;
        $this->position = $exp->position;
        $this->teamName = $exp->team_name;
        $this->jerseyNumber = $exp->jersey_number;

        $this->startingMonth = $exp->start_month;
        $this->startingYear = $exp->start_year;
        $this->endingMonth = $exp->end_month;
        $this->endingYear = $exp->end_year;

        $this->coachName = $exp->coach_name;
        $this->coachPhone = $exp->coach_phone;

        $this->editRecord = $id;
        $this->editSave = 2;
    }

    public function deleteExperience($id)
    {
        $this->deleteRecord = $id;   
    }

    public function deleteExperiencePermanent()
    {
        $exp = PlayerExperience::find($this->deleteRecord);
        $exp->delete();
        session()->flash('success_message', 'Experience Deleted.');
    }
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
