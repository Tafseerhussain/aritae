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

    protected $listeners = ['hiringRequestSent' => '$refresh'];

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

    public $searchCoach = '';
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
        return view('livewire.coach.all-coaches', [
            'coaches' => User::join('coaches', 'coaches.user_id', '=', 'users.id')
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
                            ->where('users.user_type_id', 2)
                            ->when(($this->sort && $this->sort == 'last_name'), function($q){
                                $q->orderBy('users.last_name', 'ASC');
                            })
                            ->when(($this->sort && $this->sort == 'experience'), function($q){
                                $q->orderBy('users.experience', 'DESC');
                            })
                            ->when(($this->sort && $this->sort == 'rating'), function($q){
                                    $q->orderBy('coaches.rating', 'DESC');
                            })
                            ->paginate(6),
            'coach' => Coach::find(4),
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
