<?php

namespace App\Http\Livewire\Coach;

use Livewire\Component;
use App\Models\Coach;
use App\Models\User;
use App\Models\Sport;
use App\Models\Location;
use Livewire\WithPagination;

class AllCoaches extends Component
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

    public $searchCoach = '';
    public $searchLocation = '';

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

    public function render()
    {
        return view('livewire.coach.all-coaches', [
            'coaches' => User::
                            when($this->search != '', function ($q) {
                                $q->where('full_name', 'like', '%'.$this->search.'%');
                            })
                            ->when(count($this->sport) > 0, function ($q) {
                                $q->whereIn('area_of_focus', $this->sport);
                            })
                            ->when(count($this->location) > 0, function ($q) {
                                $q->whereIn('country', $this->location);
                            })
                            ->when($this->gender != 'any', function ($q) {
                                $q->where('gender', $this->gender);
                            })
                            ->whereBetween('experience', [$this->minExp, $this->maxExp])
                            ->whereBetween('hourly_rate', [$this->minRate, $this->maxRate])
                            ->where('user_type_id', 2)
                            ->paginate(6),
            'sports' => Sport::
                        when($this->searchCoach != '', function($q) {
                            $q->where('name', 'like', '%'.$this->searchCoach.'%');
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
