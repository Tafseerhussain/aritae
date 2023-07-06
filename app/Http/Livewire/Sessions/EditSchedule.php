<?php

namespace App\Http\Livewire\Sessions;

use Livewire\Component;
use App\Models\Coach;
use App\Models\Session;
use DateTimeZone;

class EditSchedule extends Component
{
    protected $listeners = ['selectDate'];

    public $session_id;
    public $session_data = [];
    public $coaches = [];
    public $date = null;
    public $time_slot = [
        0 => '0:00 AM', 1 => '0:30 AM', 2 => '1:00 AM', 3 => '1:30 AM', 4 => '2:00 AM', 5 => '2:30 AM', 6 => '3:00 AM', 7 => '3:30 AM', 8 => '4:00 AM', 9 => '4:30 AM', 10 => '5:00 AM', 11 => '5:30 AM', 12 => '6:00 AM', 13 => '6:30 AM', 14 => '7:00 AM', 15 => '7:30 AM', 16 => '8:00 AM', 17 => '8:30 AM', 18 => '9:00 AM', 19 => '9:30 AM', 20 => '10:00 AM', 21 => '10:30 AM', 22 => '11:00 AM', 23 => '11:30 AM', 24 => '12:00 PM', 25 => '12:30 PM', 26 => '1:00 PM', 27 => '1:30 PM', 28 => '2:00 PM', 29 => '2:30 PM', 30 => '3:00 PM', 31 => '3:30 PM', 32 => '4:00 PM', 33 => '4:30 PM', 34 => '5:00 PM', 35 => '5:30 PM', 36 => '6:00 PM', 37 => '6:30 PM', 38 => '7:00 PM', 39 => '7:30 PM', 40 => '8:00 PM', 41 => '8:30 PM', 42 => '9:00 PM', 43 => '9:30 PM', 44 => '10:00 PM', 45 => '10:30 PM', 46 => '11:00 PM', 47 => '11:30 PM',
    ];
    public $selected_slot = [];
    public $timezone = "";

    public $timezones = null;

    public function mount($session_id){
        $this->session_data = Session::find($session_id);

        //$this->session_data = $data;
        if($this->session_data->coaches)
            $this->coaches = $this->session_data->coaches;
        
        $this->timezones = DateTimeZone::listIdentifiers(DateTimeZone::ALL);

        //Initiate session data
        $this->date = $this->session_data->date;
        $time_slot_data = json_decode($this->session_data->time_slot, true);
        foreach($time_slot_data as $slot){
            array_push($this->selected_slot, $slot);
        }
        $this->timezone = $this->session_data->timezone;
    }

    public function selectDate($date){
        $this->date = strtotime($date);
        $this->dispatchBrowserEvent('init-calendar');
    }

    public function selectSlot($id){
        if (($key = array_search($id, $this->selected_slot)) !== false)
            unset($this->selected_slot[$key]);
        else
            array_push($this->selected_slot, $id);

        $this->dispatchBrowserEvent('init-calendar');
    }

    public function submitSchedule(){
        $this->dispatchBrowserEvent('init-calendar');

        $this->validate([
            'timezone' => ['required'],
            'selected_slot' => ['required', 'array', 'min:1'],
        ],
        [
            'selected_slot.required' => 'Time slot selection is required',
            'selected_slot.array' => 'Time slot selection must be an arrray',
            'selected_slot.min' => 'At least on time slot selection required',
        ]);

        $data = [
            'name' => $this->session_data['name'],
            'sport' => $this->session_data['sport'],
            'phone' => $this->session_data['phone'],
            'video_session' => $this->session_data['video_session'],
            'site_session' => $this->session_data['site_session'],
            'location' => $this->session_data['location'],
            'description' => $this->session_data['description'],
            'coaches' => $this->session_data['coaches'],
            'timezone' => $this->timezone,
            'time_slot' => $this->selected_slot,
            'date' => $this->date,
        ];

        $this->session_data->timezone = $this->timezone;
        $this->session_data->time_slot = json_encode($this->selected_slot);
        $this->session_data->date = $this->date;
        $this->session_data->save();

        $this->emit('scheduleUpdated');    
        $this->dispatchBrowserEvent('notify', array(
            'type' => 'info',
            'title' => 'Session Rescheduled',
            'message' => 'Session schedule updated successfully',
        ));   
    }

    public function render()
    {
        return view('livewire.sessions.edit-schedule');
    }
}
