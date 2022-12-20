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

    public function render()
    {
        return view('livewire.player.all-players', [
            'players' => User::
                            when($this->search != '', function ($q) {
                                $q->where('full_name', 'like', '%'.$this->search.'%');
                            })
                            ->when(count($this->sport) > 0, function ($q) {

                                // $q->whereIn('area_of_focus', $this->sport);
                            
                                $q->whereHas(
                                    'sports', function($q2){
                                        $q2->whereIn('name', $this->sport);
                                    }
                                );

                            })
                            ->when(count($this->location) > 0, function ($q) {
                                $q->whereIn('country', $this->location);
                            })
                            ->when($this->gender != 'any', function ($q) {
                                $q->where('gender', $this->gender);
                            })
                            ->whereBetween('experience', [$this->minExp, $this->maxExp])
                            ->whereBetween('hourly_rate', [$this->minRate, $this->maxRate])
                            ->where('user_type_id', 4)
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
