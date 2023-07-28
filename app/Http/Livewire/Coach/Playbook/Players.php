<?php

namespace App\Http\Livewire\Coach\Playbook;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PlayerPlaybook;
use App\Models\Player;
use App\Events\PlaybookRequest;
use App\Traits\CreateNotification;
use Auth;

class Players extends Component
{
    use WithPagination, CreateNotification;

    public $players;
    public $per_page = 6;
    public $current_page = 1;
    public $total_player;
    public $total_page;
    public $search = '';
    public $status = 'All';

    public function mount(){
        $this->players = Auth::user()->coach->players()->limit($this->per_page)->get();
        $this->total_player = Auth::user()->coach->players()->count();
        $this->total_page = ceil($this->total_player / $this->per_page);
    }

    public function updatedSearch(){
        $this->reloadPlayers();
        $this->total_page = ceil($this->total_player / $this->per_page);
    }

    public function changePage($page){
        $this->current_page = $page;
        $start = ($this->current_page - 1) * $this->per_page;

        $this->reloadPlayers();
        $this->total_page = ceil($this->total_player / $this->per_page);
    }

    public function statusFilter($status){
        $this->status = $status;
        $this->reloadPlayers();
        $this->total_page = ceil($this->total_player / $this->per_page);
    }

    public function sendPlaybook($player_id){
        $player = Player::find($player_id);

        $playbook = PlayerPlaybook::create([
            'coach_id' => Auth::user()->coach->id,
            'player_id' => $player_id,
            'status' => 'requested',
        ]);

        $this->dispatchBrowserEvent('notify', array(
            'type' => 'info',
            'title' => 'Playbook sent',
            'message' => 'The playbook has been successfully sent to the player.',
        ));

        //Send pusher notification
        broadcast(new PlaybookRequest(
            Auth::user()->coach,
            $player,
            $playbook,
            'playbook-requested',
        ));

        $this->pushUserNotification(
            $player->user,
            'playbook-request', 
            'Received Playbook', 
            'Playbook request received from ' . Auth::user()->coach->name,
            $playbook->id
        );
        $this->reloadPlayers();
    }

    private function reloadPlayers(){
        if($this->status == 'All'){
            if($this->search == ''){
                $start = ($this->current_page - 1) * $this->per_page;

                $this->players = Auth::user()->coach->players()->offset($start)->limit($this->per_page)->get();
                $this->total_player = Auth::user()->coach->players()->count();
            }
            else{
                $start = ($this->current_page - 1) * $this->per_page;

                $this->players = Auth::user()->coach->players()->where('name', 'LIKE', '%'.$this->search.'%')->offset($start)->limit($this->per_page)->get();
                $this->total_player = Auth::user()->coach->players()->where('name', 'LIKE', '%'.$this->search.'%')->count();
            }
        }
        else{
            if($this->search == ''){
                $start = ($this->current_page - 1) * $this->per_page;

                if($this->status == 'Not Requested'){
                    $this->players = Auth::user()->coach->players()->with(['player_playbooks'])
                    ->whereDoesntHave('player_playbooks', function($query){
                        $query->where('coach_id', Auth::user()->coach->id);
                    })
                    ->offset($start)->limit($this->per_page)->get();

                    $this->total_player = Auth::user()->coach->players()->with(['player_playbooks'])
                    ->whereDoesntHave('player_playbooks', function($query){
                        $query->where('coach_id', Auth::user()->coach->id);
                    })->count();
                }
                else{
                    $this->players = Auth::user()->coach->players()->with(['player_playbooks'])
                    ->whereHas('player_playbooks', function($query){
                        $status = $this->status == 'Submitted' ? 'submitted' : 'requested';
                        $query->where('status', $status);
                        $query->where('coach_id', Auth::user()->coach->id);
                    })
                    ->offset($start)->limit($this->per_page)->get();

                    $this->total_player = Auth::user()->coach->players()->with(['player_playbooks'])
                    ->whereHas('player_playbooks', function($query){
                        $status = $this->status == 'Submitted' ? 'submitted' : 'requested';
                        $query->where('status', $status);
                        $query->where('coach_id', Auth::user()->coach->id);
                    })->count();
                }
            }
            else{
                $start = ($this->current_page - 1) * $this->per_page;

                if($this->status == 'Not Requested'){
                    $this->players = Auth::user()->coach->players()->with(['player_playbooks'])
                    ->whereDoesntHave('player_playbooks', function($query){
                        $query->where('coach_id', Auth::user()->coach->id);
                    })
                    ->where('name', 'LIKE', '%'.$this->search.'%')
                    ->offset($start)->limit($this->per_page)->get();

                    $this->total_player = Auth::user()->coach->players()->with(['player_playbooks'])
                    ->whereDoesntHave('player_playbooks', function($query){
                        $query->where('coach_id', Auth::user()->coach->id);
                    })
                    ->where('name', 'LIKE', '%'.$this->search.'%')->count();
                }
                else{
                    $this->players = Auth::user()->coach->players()->with(['player_playbooks'])
                    ->whereHas('player_playbooks', function($query){
                        $status = $this->status == 'Submitted' ? 'submitted' : 'requested';
                        $query->where('status', $status);
                        $query->where('coach_id', Auth::user()->coach->id);
                    })
                    ->where('name', 'LIKE', '%'.$this->search.'%')
                    ->offset($start)->limit($this->per_page)->get();
                    
                    $this->total_player = Auth::user()->coach->players()->with(['player_playbooks'])
                    ->whereHas('player_playbooks', function($query){
                        $status = $this->status == 'Submitted' ? 'submitted' : 'requested';
                        $query->where('status', $status);
                        $query->where('coach_id', Auth::user()->coach->id);
                    })
                    ->where('name', 'LIKE', '%'.$this->search.'%')->count();
                }
            }
        }
    }

    public function viewPlaybook($playbook_id){
        $this->emit('viewPlaybook', $playbook_id);
    }

    public function render()
    {
        return view('livewire.coach.playbook.players');
    }
}
