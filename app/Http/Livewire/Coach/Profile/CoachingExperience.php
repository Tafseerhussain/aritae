<?php

namespace App\Http\Livewire\Coach\Profile;

use Livewire\Component;
use Auth;

class CoachingExperience extends Component
{
    public $clubName;
    public $position;
    public $description;
    public $startingMonth = '';
    public $startingYear = '';
    public $endingMonth = '';
    public $endingYear = '';

    public $editSave = 1;
    public $editRecord;
    public $deleteRecord;

    public function submit()
    {
        $this->validate([
            'clubName' => 'required',
            'position' => 'required',
            'description' => 'required',
            'startingMonth' => 'required',
            'startingYear' => 'required',
            'endingMonth' => 'required',
            'endingYear' => 'required',
        ]);

        if ($this->editSave == 1) {
            $exp = new \App\Models\CoachingExperience;
            $exp->coach_id = Auth::user()->coach->id;
        }
        if ($this->editSave == 2) {
            $exp = \App\Models\CoachingExperience::find($this->editRecord);
        }

        $exp->club_name = $this->clubName;
        $exp->position = $this->position;
        $exp->description = $this->description;
        $exp->start_month = $this->startingMonth;
        $exp->start_year = $this->startingYear;
        $exp->end_month = $this->endingMonth;
        $exp->end_year = $this->endingYear;
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

    public function hideMessage()
    {
        session()->forget('success_message');
    }

    public function editExperience($id)
    {
        $exp = \App\Models\CoachingExperience::find($id);
        $this->clubName = $exp->club_name ;
        $this->position = $exp->position ;
        $this->description = $exp->description ;
        $this->startingMonth = $exp->start_month ;
        $this->startingYear = $exp->start_year ;
        $this->endingMonth = $exp->end_month ;
        $this->endingYear = $exp->end_year ;
        $this->editRecord = $id;
        $this->editSave = 2;
    }

    public function deleteExperience($id)
    {
        $this->deleteRecord = $id;   
    }

    public function deleteExperiencePermanent()
    {
        $exp = \App\Models\CoachingExperience::find($this->deleteRecord);
        $exp->delete();
        session()->flash('success_message', 'Experience Deleted.');
    }

    public function updateEditSave($id)
    {
        $this->editSave = $id;
        $this->reset();
    }

    public function render()
    {
        return view('livewire.coach.profile.coaching-experience', [
            'experiences' => \App\Models\CoachingExperience::where('coach_id', Auth::user()->coach->id)->get(),
        ]);
    }
}
