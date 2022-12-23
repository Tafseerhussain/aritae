<?php

namespace App\Http\Livewire\Coach\Profile;

use Livewire\Component;
use Auth;

class HourlyRate extends Component
{
    public $hourlyRate;

    protected $listeners = ['hourlyRateUpdated' => '$refresh'];

    public function mount(){
        $this->hourlyRate = Auth::user()->hourly_rate;
    }

    public function submit(){
        $user = Auth::user();

        $user->hourly_rate = $this->hourlyRate;
        $user->save();

        $user->coach->hourly_rate = $this->hourlyRate;
        $user->coach->save();

        $this->hourlyRate = Auth::user()->hourly_rate;

        $this->emit('hourlyRateUpdated');
    }

    public function render()
    {
        return view('livewire.coach.profile.hourly-rate');
    }
}
