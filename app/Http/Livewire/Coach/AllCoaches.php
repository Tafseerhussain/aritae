<?php

namespace App\Http\Livewire\Coach;

use Livewire\Component;
use App\Models\Coach;
use Livewire\WithPagination;

class AllCoaches extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        if ($this->search == '') {

            return view('livewire.coach.all-coaches', [
                'coaches' => Coach::paginate(6),
            ]);
            
        } else {
            return view('livewire.coach.all-coaches', [
                'coaches' => Coach::where('name', 'like', '%'.$this->search.'%')->paginate(6),
            ]);

        }
    }
}
