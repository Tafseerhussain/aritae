<?php

namespace App\Http\Livewire\Sessions;

use Livewire\Component;
use App\Models\Coach;
use App\Models\Session;
use App\Models\Sport;
use App\Traits\SessionTrait;
use Auth;

class ConfirmJoin extends Component
{
    use SessionTrait;

    public $session_id = null;
    public $session_data = [];
    public $coaches = [];

    public function mount($session_id){
        if($session_id){
            $this->session_data = Session::find($session_id);
        }

        //Get coach
        if($this->session_data)
            $this->coaches = $this->session_data->coaches;
    }

    public function confirmJoin(){
        if(Auth::user()->user_type_id == 2){
            $this->session_data->coaches()->syncWithoutDetaching(Auth::user()->coach->id);
            
            $this->emit('sessionCoachJoined');
            $this->dispatchBrowserEvent('notify', array(
                'type' => 'info',
                'title' => 'Session Enrollment',
                'message' => 'Joining session successful.',
            ));
        }
    }

    public function render()
    {
        return view('livewire.sessions.confirm-join');
    }
}
