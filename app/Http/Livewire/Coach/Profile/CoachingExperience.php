<?php

namespace App\Http\Livewire\Coach\Profile;

use Livewire\Component;
use App\Models\CoachingExperience as Experience;
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


        //Update experience
        $this->calculateExperience();

        //Emit score update
        $this->emit('shouldUpdateScore');
        
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

        //Update experience
        $this->calculateExperience();

        //Emit score update
        $this->emit('shouldUpdateScore');

        session()->flash('success_message', 'Experience Deleted.');
    }

    public function updateEditSave($id)
    {
        $this->editSave = $id;
        $this->reset();
    }

    private function calculateExperience(){
        $experiences = Experience::where('coach_id', Auth::user()->coach->id)->get();

        $total_months = 0;
        foreach($experiences as $experience){
            $months = array(
                'January' => 1,
                'February' => 2,
                'March' => 3,
                'April' => 4,
                'May' => 5,
                'June' => 6,
                'July' => 7,
                'August' => 8,
                'September' => 9,
                'October' => 10,
                'November' => 11,
                'December' => 12,
            );

            $months = (($experience->end_year - $experience->start_year) * 12) + ($months[$experience->end_month] - $months[$experience->start_month]);
            $total_months += $months;

        }

        $experience = (int) $total_months / 12;
        $user = Auth::user();
        $user->experience = $experience;
        $user->save();

        $user->coach->experience = $experience;
        $user->coach->save();
    }

    public function render()
    {
        return view('livewire.coach.profile.coaching-experience', [
            'experiences' => \App\Models\CoachingExperience::where('coach_id', Auth::user()->coach->id)->get(),
        ]);
    }
}
