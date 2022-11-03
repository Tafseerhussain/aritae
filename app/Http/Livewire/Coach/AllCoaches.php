<?php

namespace App\Http\Livewire\Coach;

use Livewire\Component;
use App\Models\Coach;
use App\Models\Sport;
use Livewire\WithPagination;

class AllCoaches extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $sport = [];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function filterResults()
    {
        dd(count($this->sport));
    }

    public function render()
    {
        if (count($this->sport) > 0) {
            if ($this->search == '') {
                return view('livewire.coach.all-coaches', [
                    'coaches' => Coach::whereIn('sport', $this->sport)->paginate(6),
                    'sports' => Sport::all()
                ]);
            } else {
                return view('livewire.coach.all-coaches', [
                    'coaches' => Coach::
                                whereIn('sport', $this->sport)
                                ->where('name', 'like', '%'.$this->search.'%')
                                ->paginate(6),
                    'sports' => Sport::all()
                ]);
            }
        }
        if ($this->search == '') {

            return view('livewire.coach.all-coaches', [
                'coaches' => Coach::paginate(6),
                'sports' => Sport::all()
            ]);
            
        } else {
            return view('livewire.coach.all-coaches', [
                'coaches' => Coach::where('name', 'like', '%'.$this->search.'%')->paginate(6),
                'sports' => Sport::all()
            ]);

        }
    }
}
