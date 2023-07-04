<?php

namespace App\Http\Livewire\Sessions;

use Livewire\Component;
use App\Models\Sport;
use App\Models\Coach;
use Auth;

class CreateSession extends Component
{
    public $session_name = '';
    public $sport = '';
    public $phone = '';
    public $video_session = true;
    public $site_session = false;
    public $location = '';
    public $description = '';
    public $selected_coaches = [];
    
    public $sports = [];
    public $coaches = [];

    public function mount(){
        $this->sports = Sport::all();
        if(Auth::user()->user_type_id == 2)
            $this->coaches = Coach::where('id', '!=', Auth::user()->coach->id)->get();
        else
            $this->coaches = Coach::all();
    }

    public function toggleCoach($id){
        if (($key = array_search($id, $this->selected_coaches)) !== false)
            unset($this->selected_coaches[$key]);
        else
            array_push($this->selected_coaches, $id);
    }

    public function submitSession(){
        $this->validate([
            'session_name' => ['required', 'min:3'],
            'sport' => ['required'],
            'phone' => ['required'],
            'site_session' => [function($attribute, $value, $fail){
                if($this->video_session && $value)
                    return $fail('Both cannot be selected!');
                else if(!$this->video_session && !$value)
                    return $fail('Session type is required!');
            }],
            'location' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
        ]);

        $data = [
            'name' => $this->session_name,
            'sport' => $this->sport,
            'phone' => $this->phone,
            'video_session' => $this->video_session,
            'site_session' => $this->site_session,
            'location' => $this->location,
            'description' => $this->description,
            'coaches' => $this->selected_coaches,
        ];

        $this->emit('createSession', $data);        
    }

    public function render()
    {
        return view('livewire.sessions.create-session');
    }
}
