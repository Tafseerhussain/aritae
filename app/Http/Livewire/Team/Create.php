<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
use App\Models\Sport;
use App\Models\Player;
use App\Models\User;
use App\Models\Team;
use App\Models\TeamRequest;
use Livewire\WithFileUploads;
use Auth;

class Create extends Component
{
    use WithFileUploads;

    public $cover_photo;
    public $logo;
    public $sports;
    public $team_name;
    public $sport;

    public $logo_background;
    public $cover_background;
    
    public $players = [];
    public $player_name = '';
    public $player_email = '';
    public $player_id = '';
    public $player_user_id = '';
    public $player_position = '';
    public $player_jersey = '';
    public $player_suggestion = [];
    public $player_error_message = '';

    public $coaches = [];
    public $coach_name = '';
    public $coach_email = '';
    public $coach_id = '';
    public $coach_user_id = '';
    public $coach_suggestion = [];

    protected $listeners = ['upload:finished' => 'fileUpload'];

    public function mount(){
        $this->sports = Sport::all();
        $this->logo_background = asset('assets/img/default/team-logo.png');
        $this->cover_background = asset('assets/img/default/default-cover.jpg');
    }

    public function submitTeam(){
        $this->validate([
            'team_name' => ['required', 'string', 'min:3'],
            'sport' => ['required', 'exists:sports,name'],
            'cover_photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'logo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ]);

        $coverName = time().'_'.str_replace(' ', '_', $this->cover_photo->getClientOriginalName());     
        $this->cover_photo->storeAs('public/images/team/cover', $coverName);

        $logoName = time().'_'.str_replace(' ', '_', $this->logo->getClientOriginalName());     
        $this->logo->storeAs('public/images/team/logo', $logoName);

        $team = Team::create([
            'name' => $this->team_name,
            'sport' => $this->sport,
            'cover' => $coverName,
            'logo' => $logoName,
            'coach_id' => Auth::user()->coach->id,
        ]);

        foreach($this->players as $player){
            TeamRequest::create([
                'team_id' => $team->id,
                'user_id' => $player['user_id'],
                'user_type' => 4,
                'position' => $player['position'],
                'jersey' => $player['jersey'],
            ]);
        }

        foreach($this->coaches as $coach){
            if($coach['id'] != Auth::user()->coach->id){
                TeamRequest::create([
                    'team_id' => $team->id,
                    'user_id' => $coach['user_id'],
                    'user_type' => 2,
                ]);
            }
        }

        $this->dispatchBrowserEvent('notify', array(
            'type' => 'info',
            'title' => 'Team created',
            'message' => 'Team created successfully, awaiting for admin approval.',
        ));

        $this->emit('teamCreated');
    }

    public function fileUpload($event){
        if($event == 'cover_photo'){
            $this->cover_background = $this->cover_photo->temporaryUrl();
        }
        if($event == 'logo'){
            $this->logo_background = $this->logo->temporaryUrl();
        }
    }

    public function openPlayerModal(){
        $this->dispatchBrowserEvent('openPlayerModal');
    }

    public function playerSuggestion(){
        $key = $this->player_name;
        if(strlen($key) > 1){
            $users = User::where('user_type_id', 4)->where(function($query) use ($key){
                $query->where('full_name', 'LIKE', '%'.$key.'%');
                $query->orWhere('email', 'LIKE', '%'.$key.'%');
            })->limit(5)->get();

            $this->player_suggestion = [];

            foreach($users as $user){
                array_push($this->player_suggestion, array(
                    'name' => $user->full_name,
                    'email' => $user->email,
                    'id' => $user->player->id,
                    'user_id' => $user->id
                ));
            }
        }
        else{
            $this->player_suggestion = [];
        }
    }

    public function selectPlayer($name, $email, $id, $user_id){
        $this->player_name = $name;
        $this->player_email = $email;
        $this->player_id = $id;
        $this->player_user_id = $user_id;

        $this->player_suggestion = [];
    }

    public function addPlayer(){
        if(!$this->player_name || !$this->player_email || !$this->player_id || !$this->player_user_id){
            $this->player_error_message = "Please select a player";
        }
        else if(!$this->player_position){
            $this->player_error_message = "Please define a position";
        }
        else if(!$this->player_jersey){
            $this->player_error_message = "Please provide a jersey number";
        }
        else{
            array_push($this->players, array(
                'name' => $this->player_name,
                'email' => $this-> player_email,
                'id' => $this->player_id,
                'user_id' => $this->player_user_id,
                'position' => $this->player_position,
                'jersey' => $this->player_jersey
            ));

            //Reset properties
            $this->player_name = '';
            $this->player_email = '';
            $this->player_id = '';
            $this->player_user_id = '';
            $this->player_position = '';
            $this->player_jersey = '';
            $this->player_error_message = '';

            $this->dispatchBrowserEvent('closePlayerModal');
        }
    }

    public function deletePlayer($id){
        foreach($this->players as $key => $player){
            if($player['id'] == $id)
                unset($this->players[$key]);
        }
    }

    public function openCoachModal(){
        $this->dispatchBrowserEvent('openCoachModal');
    }

    public function coachSuggestion(){
        $key = $this->coach_name;
        if(strlen($key) > 1){
            $users = User::where('user_type_id', 2)->where(function($query) use ($key){
                $query->where('full_name', 'LIKE', '%'.$key.'%');
                $query->orWhere('email', 'LIKE', '%'.$key.'%');
            })->limit(5)->get();

            $this->coach_suggestion = [];

            foreach($users as $user){
                array_push($this->coach_suggestion, array(
                    'name' => $user->full_name,
                    'email' => $user->email,
                    'id' => $user->coach->id,
                    'user_id' => $user->id
                ));
            }
        }
        else{
            $this->coach_suggestion = [];
        }
    }

    public function addCoach($name, $email, $id, $user_id){
        array_push($this->coaches, array(
            'name' => $name,
            'email' => $email,
            'id' => $id,
            'user_id' => $user_id,
        ));

        //Reset properties
        $this->coach_name = '';
        $this->coach_email = '';
        $this->coach_id = '';
        $this->coach_user_id = '';
        $this->coach_suggestion = [];

        $this->dispatchBrowserEvent('closeCoachModal');
    }

    public function deleteCoach($id){
        foreach($this->coaches as $key => $coach){
            if($coach['id'] == $id)
                unset($this->coaches[$key]);
        }
    }

    public function render()
    {
        return view('livewire.team.create', ['sports' => $this->sports]);
    }
}
