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

    public function submit()
    {
        $this->validate([
            'institutionName' => 'required',
            'degreeTitle' => 'required',
            'startingMonth' => 'required',
            'startingYear' => 'required',
            'endingMonth' => 'required',
            'endingYear' => 'required',
        ]);
        if ($this->editSave == 1) {
            $education = new PlayerEducation;
            $education->player_id = Auth::user()->player->id;
            session()->flash('success_message', 'Education Added.');
        } else {
            $education = PlayerEducation::find($this->editRecord);
            session()->flash('success_message', 'Education Updated.');
        }
        $education->institute_name = $this->institutionName;
        $education->degree = $this->degreeTitle;
        $education->start_month = $this->startingMonth;
        $education->start_year = $this->startingYear;
        $education->end_month = $this->endingMonth;
        $education->end_year = $this->endingYear;
        $education->save();

        //Emit score update
        $this->emit('shouldUpdateScore');

        $this->reset();
    }

    public function editEducation($id)
    {
        $education = PlayerEducation::find($id);
        $this->institutionName = $education->institute_name;
        $this->degreeTitle = $education->degree;
        $this->startingMonth = $education->start_month;
        $this->startingYear = $education->start_year;
        $this->endingMonth = $education->end_month;
        $this->endingYear = $education->end_year;
        $this->editRecord = $id;
        $this->editSave = 2;
    }

    public function updateEditSave($id)
    {
        $this->editSave = $id;
        $this->reset();
    }

    public function deleteEducation($id)
    {
        $this->deleteRecord = $id;   
    }

    public function deleteEducationPermanent()
    {
        $education = PlayerEducation::find($this->deleteRecord);
        $education->delete();

        //Emit score update
        $this->emit('shouldUpdateScore');

        session()->flash('success_message', 'Education Deleted.');
    }

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
