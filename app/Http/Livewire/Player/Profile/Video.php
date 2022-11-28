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

    public function submit()
    {
        $this->validate([
            'videoTitle' => 'required',
            'videoLink' => 'required',
        ]);
        $video = new PlayerVideo;
        $video->player_id = Auth::user()->player->id;
        $video->video_title = $this->videoTitle;
        $video->video_link = $this->videoLink;
        $video->save();
        session()->flash('success_message', 'Video Added.');
        $this->reset();
    }

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
