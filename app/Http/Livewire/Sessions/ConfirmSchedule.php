<?php

namespace App\Http\Livewire\Sessions;

use Livewire\Component;
use App\Models\Coach;
use App\Models\Session;
use App\Models\Sport;
use App\Traits\SessionTrait;
use Auth;

class ConfirmSchedule extends Component
{
    use SessionTrait;

    public $session_data = [];
    public $time_string = '';
    public $coaches = [];

    public function mount($session_data){

        $this->time_string = $this->getTimeRange($session_data['time_slot']);

        //Get coach
        if($this->session_data['coaches'])
            $this->coaches = Coach::whereIn('id', $this->session_data['coaches'])->get();
    }

    public function confirmSession(){
        $sport = Sport::where('name', $this->session_data['sport'])->first();
        $time_slot = json_encode($this->session_data['time_slot']);
        $session = Session::create([
            'name' => $this->session_data['name'],
            'sport_id' => $sport->id,
            'phone' => $this->session_data['phone'],
            'video_session' => $this->session_data['video_session'] ? 1 : 0,
            'site_session' => $this->session_data['site_session'] ? 1 : 0,
            'location' => $this->session_data['location'],
            'description' => $this->session_data['description'],
            'timezone' => $this->session_data['timezone'],
            'time_slot' => $time_slot,
            'date' => $this->session_data['date'],
            'user_id' => Auth::id(),
        ]);

        $session->coaches()->sync($this->session_data['coaches']);

        $this->emit('sessionCreated');

        $this->dispatchBrowserEvent('notify', array(
            'type' => 'info',
            'title' => 'Session created',
            'message' => 'Session created successfully.',
        ));
    }

    public function render()
    {
        return view('livewire.sessions.confirm-schedule');
    }
}
