<?php

namespace App\Http\Livewire\Admin\CoachApproval;

use Livewire\Component;

class Main extends Component
{
    protected $listeners = [
        'showDetails',
        'back',
    ];

    public $active_component = 'coaches';
    public $coach_id = '';

    public function showDetails($coach_id){
        $this->coach_id = $coach_id;
        $this->active_component = 'details';
    }

    public function back(){
        $this->active_component = 'coaches';
        $this->coach_id = '';
    }

    public function render()
    {
        return view('livewire.admin.coach-approval.main');
    }
}
