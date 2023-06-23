<?php

namespace App\Http\Livewire\Player;

use Livewire\Component;
use App\Models\Player;
use App\Models\User;
use App\Models\Sport;
use App\Models\Location;
use Livewire\WithPagination;

class AllPlayers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $sort = '';
    public $search = '';
    public $sport = [];
    public $location = [];
    public $gender = 'any';

    public $minExp = 1;
    public $maxExp = 10;

    public $minRate = 10;
    public $maxRate = 100;

    public $searchPlayer = '';
    public $searchLocation = '';

    public $quickview = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSport()
    {
        $this->resetPage();
    }

    public function updatingGender()
    {
        $this->resetPage();
    }

    public function viewProfile($id)
    {
        $this->quickview = User::findOrFail($id);
    }

    public function apply_filter(){
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.player.all-players', [
            'players' => User::join('players', 'players.user_id', '=', 'users.id')
                            ->when($this->search != '', function ($q) {
                                $q->where('users.full_name', 'like', '%'.$this->search.'%');
                            })
                            ->when(count($this->sport) > 0, function ($q) {
                                // $q->whereIn('area_of_focus', $this->sport);
                                $q->where( function($query){
                                    foreach($this->sport as $single_sport){
                                        $query->orWhere('users.area_of_focus', 'LIKE', '%'.$single_sport.'%');
                                    }
                                });

                            })
                            ->when(count($this->location) > 0, function ($q) {
                                $q->whereIn('users.country', $this->location);
                            })
                            ->when($this->gender != 'any', function ($q) {
                                $q->where('users.gender', $this->gender);
                            })
                            ->whereBetween('users.experience', [$this->minExp, $this->maxExp])
                            ->whereBetween('users.hourly_rate', [$this->minRate, $this->maxRate])
                            ->where('users.user_type_id', 4)
                            ->when(($this->sort && $this->sort == 'last_name'), function($q){
                                $q->orderBy('users.last_name', 'ASC');
                            })
                            ->when(($this->sort && $this->sort == 'experience'), function($q){
                                $q->orderBy('users.experience', 'DESC');
                            })
                            ->when(($this->sort && $this->sort == 'rating'), function($q){
                                    $q->orderBy('players.rating', 'DESC');
                            })
                            ->paginate(6),
            'player' => Player::find(4),
            'sports' => Sport::
                        when($this->searchPlayer != '', function($q) {
                            $q->where('name', 'like', '%'.$this->searchPlayer.'%');
                        })
                        ->get(),
            'locations' => Location::
                        when($this->searchLocation != '', function($q) {
                            $q->where('location', 'like', '%'.$this->searchLocation.'%');
                        })
                        ->get(),
        ]);
    }
}
