<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Notification;
use Auth;

class AdminNotification extends Component
{
    use WithPagination;

    public $notifications;

    public $per_page = 10;
    public $current_page = 1;
    public $total_notification;
    public $total_page;

    public function mount(){
        $this->notifications = Auth::user()->notifications()->limit($this->per_page)->orderBy('created_at', 'DESC')->get();
        $this->total_notification = Auth::user()->notifications()->count();
        $this->total_page = ceil($this->total_notification / $this->per_page);

        //Read all notification
        Auth::user()->notifications()->update(['read' => 1]);
    }

    public function changePage($page){
        $this->current_page = $page;
        $start = ($this->current_page - 1) * $this->per_page;

        $this->reloadResponses();
        $this->total_page = ceil($this->total_notification / $this->per_page);
    }

    private function reloadResponses(){
        $start = ($this->current_page - 1) * $this->per_page;

        $this->notifications = Auth::user()->notifications()->offset($start)->limit($this->per_page)->orderBy('created_at', 'DESC')->get();
        $this->total_response = Auth::user()->notifications()->count();
    }

    public function render()
    {
        return view('livewire.admin.admin-notification');
    }
}
