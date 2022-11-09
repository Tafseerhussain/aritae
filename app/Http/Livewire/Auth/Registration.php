<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Registration extends Component
{
    public $step = 1;

    public function changeStep($step)
    {
        $this->step = $step;
    }
    public function render()
    {
        return view('livewire.auth.registration');
    }
}
