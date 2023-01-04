<?php

namespace App\Http\Livewire\Parent;

use Livewire\Component;
use App\Models\User;
use Auth;

class Player extends Component
{
    public $players;
    public $player_search_name;
    public $player_search_suggestion = [];

    public function mount(){
        $this->players = Auth::user()->parent->players;
    }

    public function updateSuggestion(){
        $search_key = $this->player_search_name;
        if($search_key && strlen($search_key) > 2){
            $this->player_search_suggestion = User::where('user_type_id', 4)->where(function($query) use ($search_key){
                $query->where('full_name', 'LIKE', '%'.$search_key.'%');
                $query->orWhere('email', 'LIKE', '%'.$search_key.'%');
            })->limit(5)->get();
        }
        else{
            $this->player_search_suggestion = [];
        }
    }

    public function attachPlayer($email){
        $user = User::where('email', $email)->with('player')->first();
        
        if($user && $user->user_type_id == 4){
            Auth::user()->parent->players()->syncWithoutDetaching($user->player->id);
            $this->player_search_suggestion = [];
            $this->player_search_name = '';
            $this->players = Auth::user()->parent->players;

            $this->dispatchBrowserEvent('hideAddPlayerModal');
        }
    }

    public function removePlayer($id){
        Auth::user()->parent->players()->detach($id);

        $this->players = Auth::user()->parent->players;
    }

    public function render()
    {
        return view('livewire.parent.player', [
            'players' => $this->players,
        ]);
    }
}
