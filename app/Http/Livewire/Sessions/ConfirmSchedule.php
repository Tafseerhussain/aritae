<?php

namespace App\Http\Livewire\Sessions;

use Livewire\Component;
use App\Models\Coach;
use App\Models\Session;
use App\Models\Sport;
use Auth;

class ConfirmSchedule extends Component
{
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
            'video_session' => $this->session_data['video_session'],
            'site_session' => $this->session_data['site_session'],
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

    private function getTimeRange($time_slot){
        sort($time_slot);
        $time_string = '';

        //Start Time
        $start_time = $time_slot[0];
        $start_time = $start_time > 26 ? ($start_time - 24) : $start_time;

        $time_string .= ($start_time / 2) == 0 ? intval($start_time/2) . ':00 ' : intval($start_time/2) . ':30 ';
        $time_string .= $time_slot[0] > 24 ? 'PM - ' : 'AM - ';
        
        //End Time
        $end_time = $time_slot[count($time_slot) - 1];
        $end_time = $end_time > 26 ? ($end_time - 24) : $end_time;

        $time_string .= ($end_time / 2) == 0 ? intval($end_time/2) . ':29 ' : intval($end_time/2) . ':59 ';
        $time_string .= $time_slot[count($time_slot) - 1] > 24 ? 'PM' : 'AM';
        
        return $time_string;
    }

    public function render()
    {
        return view('livewire.sessions.confirm-schedule');
    }
}
