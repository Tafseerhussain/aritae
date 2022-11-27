<?php

namespace App\Http\Livewire\Player\Profile;

use Livewire\Component;
use App\Models\Player\PlayerCertification;
use Auth;
use Livewire\WithFileUploads;

class Certification extends Component
{
    use WithFileUploads;

    public $certificateName;
    public $clubName;
    public $certificateYear = '';
    public $certificate;

    public $editSave = 1;
    public $editRecord;
    public $deleteRecord;

    public function hideMessage()
    {
        session()->forget('success_message');
    }

    public function render()
    {
        return view('livewire.player.profile.certification', [
            'certificates' => PlayerCertification::where('player_id', Auth::user()->player->id)->get(),
        ]);
    }
}
