<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;

class NavbarNotification extends Component
{
    public $notifications = [];
    public $new_notification_count = 0;

    public function mount(){
        $this->notifications = Auth::user()->notifications()->limit(5)->orderBy('created_at', 'DESC')->get();
        $this->new_notification_count = Auth::user()->notifications()->where('read', 0)->count();
    }

    public function read_notification(){
        Auth::user()->notifications()->update(['read' => 1]);
        $this->new_notification_count = Auth::user()->notifications()->where('read', 0)->count();
    }

    public function render()
    {
        return view('livewire.navbar-notification');
    }
}
