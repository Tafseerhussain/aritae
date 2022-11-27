<?php

namespace App\Http\Livewire\Player\Profile;

use Livewire\Component;
use App\Models\Player\PlayerVideo;
use Auth;

class Video extends Component
{
    public $videoTitle;
    public $videoLink;

    public $editSave = 1;
    public $editRecord;
    public $deleteRecord;

    public function hideMessage()
    {
        session()->forget('success_message');
    }

    public function render()
    {
        return view('livewire.player.profile.video', [
            'videos' => PlayerVideo::where('player_id', Auth::user()->player->id)->get()
        ]);
    }
}
