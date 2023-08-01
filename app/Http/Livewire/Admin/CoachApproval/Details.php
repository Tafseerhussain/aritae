<?php

namespace App\Http\Livewire\Admin\CoachApproval;

use Livewire\Component;
use App\Models\Coach;

class Details extends Component
{
    public $coach_id = '';
    public $coach = '';
    public $participation = '';

    public function mount($coach_id){
        $this->coach_id = $coach_id;
        $this->coach = Coach::find($this->coach_id);
        $this->participation = $this->coach->participation;
    }

    public function back(){
        $this->emit('back');
    }

    public function approve(){
        $this->participation->approval = 'approved';
        $this->participation->save();

        $this->dispatchBrowserEvent('notify', array(
            'type' => 'info',
            'title' => 'Coach Approved',
            'message' => 'Coach account approved succefully',
        ));
        $this->emit('back');
    }

    public function decline(){
        $this->participation->approval = 'declined';
        $this->participation->save();

        $this->dispatchBrowserEvent('notify', array(
            'type' => 'error',
            'title' => 'Coach Declined',
            'message' => 'Coach account declined',
        ));
        $this->emit('back');
    }

    public function render()
    {
        return view('livewire.admin.coach-approval.details');
    }
}
