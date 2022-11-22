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

        $exp = new \App\Models\CoachingExperience;
        $exp->coach_id = Auth::user()->coach->id;
        $exp->club_name = $this->clubName;
        $exp->position = $this->position;
        $exp->description = $this->description;
        $exp->start_month = $this->startingMonth;
        $exp->start_year = $this->startingYear;
        $exp->end_month = $this->endingMonth;
        $exp->end_year = $this->endingYear;
        $exp->save();

        session()->flash('success_message', 'Experience Added.');
    }

    public function hideMessage()
    {
        session()->forget('success_message');
    }
    
    public function render()
    {
        return view('livewire.coach.profile.coaching-experience', [
            'experiences' => \App\Models\CoachingExperience::all(),
        ]);
    }
}
