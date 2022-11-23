<?php

namespace App\Http\Livewire\Coach\Profile;

use Livewire\Component;
use App\Models\CoachVideo;
use Auth;

class Videos extends Component
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
        $video = new CoachVideo;
        $video->coach_id = Auth::user()->coach->id;
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
        return view('livewire.coach.profile.videos', [
            'videos' => CoachVideo::where('coach_id', Auth::user()->coach->id)->get()
        ]);
    }
}
