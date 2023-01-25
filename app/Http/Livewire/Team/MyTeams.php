<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
use App\Models\User;
use App\Models\Team;
use App\Models\TeamRequest;
use Auth;

class MyTeams extends Component
{
    public $teams = [];

    public $team_id;
    public $player_name = '';
    public $player_email = '';
    public $player_id = '';
    public $player_user_id = '';
    public $player_position = '';
    public $player_jersey = '';
    public $player_suggestion = [];
    public $player_error_message = '';

    public $coach_name = '';
    public $coach_email = '';
    public $coach_id = '';
    public $coach_user_id = '';
    public $coach_suggestion = [];

    public function mount(){
        if(Auth::user()->user_type_id == 2)
            $this->teams = Auth::user()->coach->own_teams()->where('status', 'active')->with('players', 'coaches')->get();
        if(Auth::user()->user_type_id == 4)
            $this->teams = Auth::user()->player->teams()->where('status', 'active')->with('players', 'coaches')->get();
    }

    public function openPlayerModal($team_id){
        $this->team_id = $team_id;
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
            $team = Team::find($this->team_id);
            $team_player = $team->players()->where('player_id', $this->player_id)->first();
            $requested = TeamRequest::where('user_id', $this->player_user_id)->where('team_id', $this->team_id)->first();

            if($team_player){
                $this->dispatchBrowserEvent('notify', array(
                    'type' => 'error',
                    'title' => 'Player already added',
                    'message' => 'Selected player already added to this team',
                ));
            }
            else if($requested){
                $this->dispatchBrowserEvent('notify', array(
                    'type' => 'error',
                    'title' => 'Player already requested',
                    'message' => 'Selected player already requested to this team',
                ));
            }
            else{
                TeamRequest::create([
                    'team_id' => $this->team_id,
                    'user_id' => $this->player_user_id,
                    'user_type' => 4,
                    'position' => $this->player_position,
                    'jersey' => $this->player_jersey,
                ]);

                $this->dispatchBrowserEvent('notify', array(
                    'type' => 'info',
                    'title' => 'Player Invited',
                    'message' => 'Player invited to this team successfully',
                ));
            }

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

    public function removePlayer($player_id, $team_id){
        $team = Team::find($team_id);
        $team->players()->detach($player_id);

        $this->dispatchBrowserEvent('notify', array(
            'type' => 'info',
            'title' => 'Player removed',
            'message' => 'Player removed from this team successfully',
        ));

        $this->teams = Auth::user()->player->teams()->where('status', 'active')->with('players', 'coaches')->get();
    }

    public function openCoachModal($team_id){
        $this->team_id = $team_id;
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
        $team = Team::find($this->team_id);
        $team_coach = $team->coaches()->where('coach_id', $id)->first();
        $requested = TeamRequest::where('user_id', $user_id)->where('team_id', $this->team_id)->first();

        if($team_coach || Auth::id() == $user_id){
            $this->dispatchBrowserEvent('notify', array(
                'type' => 'error',
                'title' => 'Coach already added',
                'message' => 'Selected coach already added to this team',
            ));
        }
        else if($requested){
            $this->dispatchBrowserEvent('notify', array(
                'type' => 'error',
                'title' => 'Coach already requested',
                'message' => 'Selected player already requested to this team',
            ));
        }
        else{
            TeamRequest::create([
                'team_id' => $this->team_id,
                'user_id' => $user_id,
                'user_type' => 2,
            ]);

            $this->dispatchBrowserEvent('notify', array(
                'type' => 'info',
                'title' => 'Coach Invited',
                'message' => 'Coach invited to this team successfully',
            ));
        }

        //Reset properties
        $this->coach_name = '';
        $this->coach_email = '';
        $this->coach_id = '';
        $this->coach_user_id = '';
        $this->coach_suggestion = [];

        $this->dispatchBrowserEvent('closeCoachModal');
    }

    public function removeCoach($coach_id, $team_id){
        $team = Team::find($team_id);
        $team->coaches()->detach($coach_id);

        $this->dispatchBrowserEvent('notify', array(
            'type' => 'info',
            'title' => 'Coach removed',
            'message' => 'Coach removed from this team successfully',
        ));

        $this->teams = Auth::user()->coach->own_teams()->where('status', 'active')->with('players', 'coaches')->get();
    }

    public function render()
    {
        return view('livewire.team.my-teams', ['teams' => $this->teams]);
    }
}
