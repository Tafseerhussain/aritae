<?php

namespace App\Http\Livewire\Sessions;

use Livewire\Component;
use App\Models\Sport;
use App\Models\Coach;
use App\Models\Session;
use Auth;

class EditSession extends Component
{
    public $session_id;
    public $session_data;
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

    public function mount($session_id){
        $this->sports = Sport::all();
        if(Auth::user()->user_type_id == 2)
            $this->coaches = Coach::where('id', '!=', Auth::user()->coach->id)->get();
        else
            $this->coaches = Coach::all();

        $this->session_data = Session::find($session_id);

        //Initiate session data
        $this->session_name = $this->session_data->name;
        $this->sport = $this->session_data->sport->name;
        $this->phone = $this->session_data->phone;
        $this->video_session = $this->session_data->video_session ? true : false;
        $this->site_session = $this->session_data->site_session ? true : false;
        $this->location = $this->session_data->location;
        $this->description = $this->session_data->description;
        if($this->session_data->coaches){
            foreach($this->session_data->coaches as $coach){
                array_push($this->selected_coaches, $coach->id);
            }
        }
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

        $sport_id = null;
        $sport = Sport::where('name', $this->sport)->first();
        if($sport)
            $sport_id = $sport->id;
        
        $this->session_data->name = $this->session_name;
        $this->session_data->sport_id = $sport_id;
        $this->session_data->phone = $this->phone;
        $this->session_data->video_session = $this->video_session ? 1 : 0;
        $this->session_data->site_session = $this->site_session ? 1 : 0;
        $this->session_data->location = $this->location;
        $this->session_data->description = $this->description;
        $this->session_data->save();

        $this->session_data->coaches()->sync($this->selected_coaches);

        $this->emit('sessionUpdated');    
        $this->dispatchBrowserEvent('notify', array(
            'type' => 'info',
            'title' => 'Session Updated',
            'message' => 'Session updated successfully',
        ));    
    }

    public function render()
    {
        return view('livewire.sessions.edit-session');
    }
}
