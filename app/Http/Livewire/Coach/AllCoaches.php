<?php

namespace App\Http\Livewire\Coach;

use Livewire\Component;
use App\Models\Coach;
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

    public function filterResults()
    {
        dd(count($this->sport));
    }

    public function render()
    {
        return view('livewire.coach.all-coaches', [
            'coaches' => Coach::
                            when($this->search != '', function ($q) {
                                $q->where('name', 'like', '%'.$this->search.'%');
                            })
                            ->when(count($this->sport) > 0, function ($q) {
                                $q->whereIn('sport', $this->sport);
                            })
                            ->when(count($this->location) > 0, function ($q) {
                                $q->whereIn('location', $this->location);
                            })
                            ->when($this->gender != 'any', function ($q) {
                                $q->where('gender', $this->gender);
                            })
                            ->whereBetween('experience', [$this->minExp, $this->maxExp])
                            ->paginate(6),
            'sports' => Sport::all(),
            'locations' => Location::all(),
        ]);
    }
}
