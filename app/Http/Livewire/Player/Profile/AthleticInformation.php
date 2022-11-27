<?php

namespace App\Http\Livewire\Player\Profile;

use Livewire\Component;

class AthleticInformation extends Component
{
    public $editSave = 1;
    public $editRecord;
    public $deleteRecord;

    public function hideMessage()
    {
        session()->forget('success_message');
    }
    
    public function render()
    {
        return view('livewire.player.profile.athletic-information');
    }
}
