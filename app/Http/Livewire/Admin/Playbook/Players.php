<?php

namespace App\Http\Livewire\Admin\Playbook;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Coach;
use App\Models\PlayerPlaybook;
use App\Models\Player;
use App\Events\PlaybookRequest;
use App\Traits\CreateNotification;

class Players extends Component
{
    use WithPagination, CreateNotification;

    public $coach_id = null;
    public $coach = null;

    public $players;
    public $per_page = 6;
    public $current_page = 1;
    public $total_player;
    public $total_page;
    public $search = '';
    public $status = 'All';

    public function mount($coach_id){
        $this->coach_id = $coach_id;
        $this->coach = Coach::find($coach_id);

        $this->players = $this->coach->players()->limit($this->per_page)->get();
        $this->total_player = $this->coach->players()->count();
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

    private function reloadPlayers(){
        if($this->status == 'All'){
            if($this->search == ''){
                $start = ($this->current_page - 1) * $this->per_page;

                $this->players = $this->coach->players()->offset($start)->limit($this->per_page)->get();
                $this->total_player = $this->coach->players()->count();
            }
            else{
                $start = ($this->current_page - 1) * $this->per_page;

                $this->players = $this->coach->players()->where('name', 'LIKE', '%'.$this->search.'%')->offset($start)->limit($this->per_page)->get();
                $this->total_player = $this->coach->players()->where('name', 'LIKE', '%'.$this->search.'%')->count();
            }
        }
        else{
            if($this->search == ''){
                $start = ($this->current_page - 1) * $this->per_page;

                if($this->status == 'Not Requested'){
                    $this->players = $this->coach->players()->with(['player_playbooks'])
                    ->whereDoesntHave('player_playbooks', function($query){
                        $query->where('coach_id', $this->coach_id);
                    })
                    ->offset($start)->limit($this->per_page)->get();

                    $this->total_player = $this->coach->players()->with(['player_playbooks'])
                    ->whereDoesntHave('player_playbooks', function($query){
                        $query->where('coach_id', $this->coach_id);
                    })->count();
                }
                else{
                    $this->players = $this->coach->players()->with(['player_playbooks'])
                    ->whereHas('player_playbooks', function($query){
                        $status = $this->status == 'Submitted' ? 'submitted' : 'requested';
                        $query->where('status', $status);
                        $query->where('coach_id', $this->coach_id);
                    })
                    ->offset($start)->limit($this->per_page)->get();

                    $this->total_player = $this->coach->players()->with(['player_playbooks'])
                    ->whereHas('player_playbooks', function($query){
                        $status = $this->status == 'Submitted' ? 'submitted' : 'requested';
                        $query->where('status', $status);
                        $query->where('coach_id', $this->coach_id);
                    })->count();
                }
            }
            else{
                $start = ($this->current_page - 1) * $this->per_page;

                if($this->status == 'Not Requested'){
                    $this->players = $this->coach->players()->with(['player_playbooks'])
                    ->whereDoesntHave('player_playbooks', function($query){
                        $query->where('coach_id', $this->coach_id);
                    })
                    ->where('name', 'LIKE', '%'.$this->search.'%')
                    ->offset($start)->limit($this->per_page)->get();

                    $this->total_player = $this->coach->players()->with(['player_playbooks'])
                    ->whereDoesntHave('player_playbooks', function($query){
                        $query->where('coach_id', $this->coach_id);
                    })
                    ->where('name', 'LIKE', '%'.$this->search.'%')->count();
                }
                else{
                    $this->players = $this->coach->players()->with(['player_playbooks'])
                    ->whereHas('player_playbooks', function($query){
                        $status = $this->status == 'Submitted' ? 'submitted' : 'requested';
                        $query->where('status', $status);
                        $query->where('coach_id', $this->coach_id);
                    })
                    ->where('name', 'LIKE', '%'.$this->search.'%')
                    ->offset($start)->limit($this->per_page)->get();
                    
                    $this->total_player = $this->coach->players()->with(['player_playbooks'])
                    ->whereHas('player_playbooks', function($query){
                        $status = $this->status == 'Submitted' ? 'submitted' : 'requested';
                        $query->where('status', $status);
                        $query->where('coach_id', $this->coach_id);
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
        return view('livewire.admin.playbook.players');
    }
}
