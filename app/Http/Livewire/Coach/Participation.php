<?php

namespace App\Http\Livewire\Coach;

use Livewire\Component;
use App\Models\CoachParticipation;
use Auth;

class Participation extends Component
{
    public $question1 = "";
    public $question2 = "";
    public $question3 = "";
    public $question4 = "";
    public $question5 = "";
    public $question6 = "";
    public $question7 = "";
    public $question8 = "";
    public $question9 = "";
    public $question10 = "";
    public $question11 = "";
    public $question12 = "";
    public $question13 = "";
    public $question14_1 = "";
    public $question14_2 = "";
    public $question14_3 = "";
    public $question15 = "";
    public $question16_1 = "";
    public $question16_2 = "";
    public $coach_name = "";
    public $email = "";
    public $phone = "";

    public $percent_complete = 0;

    public function mount(){
        $this->coach_name = Auth::user()->full_name;
        $this->email = Auth::user()->email;
        if(Auth::user()->user_type_id == 2)
            $this->phone = Auth::user()->coach->phone;
    }

    public function calculateCompletion(){
        $this->percent_complete = 0;
        if($this->question1 != "") $this->percent_complete += 6;
        if($this->question2 != "") $this->percent_complete += 6;
        if($this->question3 != "") $this->percent_complete += 6;
        if($this->question4 != "") $this->percent_complete += 6;
        if($this->question5 != "") $this->percent_complete += 6;
        if($this->question6 != "") $this->percent_complete += 6;
        if($this->question7 != "") $this->percent_complete += 6;
        if($this->question8 != "") $this->percent_complete += 6;
        if($this->question9 != "") $this->percent_complete += 6;
        if($this->question10 != "") $this->percent_complete += 6;
        if($this->question11 != "") $this->percent_complete += 6;
        if($this->question12 != "") $this->percent_complete += 6;
        if($this->question13 != "") $this->percent_complete += 6;
        if($this->question14_1 != "") $this->percent_complete += 2;
        if($this->question14_2 != "") $this->percent_complete += 2;
        if($this->question14_3 != "") $this->percent_complete += 2;
        if($this->question15 != "") $this->percent_complete += 6;
        if($this->question16_1 !== "") $this->percent_complete += 2;
        if($this->question16_2 !== "") $this->percent_complete += 2;
        if($this->coach_name != "") $this->percent_complete += 2;
        if($this->email != "") $this->percent_complete += 2;
        if($this->phone != "") $this->percent_complete += 2;
    }

    public function submitParticipation(){
        $this->calculateCompletion();
        
        if($this->percent_complete < 100){
            $this->dispatchBrowserEvent('notify', array(
                'type' => 'error',
                'title' => 'Form is not completed yet',
                'message' => 'Please answer all questions, and submit the form.',
            ));
        }
        else{
            
        }
    }

    public function render()
    {
        $this->calculateCompletion();
        return view('livewire.coach.participation');
    }
}
