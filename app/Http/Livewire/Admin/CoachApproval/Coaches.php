<?php

namespace App\Http\Livewire\Admin\CoachApproval;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Coach;

class Coaches extends Component
{
    use WithPagination;

    public $coaches;

    public $per_page = 6;
    public $current_page = 1;
    public $total_user;
    public $total_page;
    public $search = '';

    public function mount(){
        $this->coaches = Coach::whereHas('participation', function($query){
                $query->where('approval', 'submitted');
            })->limit($this->per_page)->get();
        $this->total_user = Coach::whereHas('participation', function($query){
                $query->where('approval', 'submitted');
            })
            ->count();
        $this->total_page = ceil($this->total_user / $this->per_page);
    }

    public function changePage($page){
        $this->current_page = $page;
        $start = ($this->current_page - 1) * $this->per_page;

        $this->reloadUsers();
        $this->total_page = ceil($this->total_user / $this->per_page);
    }

    public function updatedSearch(){
        $start = ($this->current_page - 1) * $this->per_page;

        $this->reloadUsers();
        $this->total_page = ceil($this->total_user / $this->per_page);
    }

    private function reloadUsers(){
        if($this->search == ''){
            $this->coaches = Coach::whereHas('participation', function($query){
                $query->where('approval', 'submitted');
            })->limit($this->per_page)->get();

            $this->total_user = Coach::whereHas('participation', function($query){
                $query->where('approval', 'submitted');
            })
            ->count();
        }
        else{
            $this->coaches = Coach::whereHas('participation', function($query){
                $query->where('approval', 'submitted');
            })
            ->where('name', 'LIKE', '%'.$this->search.'%')
            ->limit($this->per_page)->get();
            
            $this->total_user = Coach::whereHas('participation', function($query){
                $query->where('approval', 'submitted');
            })
            ->where('name', 'LIKE', '%'.$this->search.'%')
            ->count();
        }
    }

    public function showDetails($coach_id){
        $this->emit('showDetails', $coach_id);
    }

    public function render()
    {
        return view('livewire.admin.coach-approval.coaches');
    }
}
