<?php

namespace App\Http\Livewire\Sessions;

use Livewire\Component;
use App\Models\Session;
use App\Traits\SessionTrait;
use Auth;

class Sessions extends Component
{
    use SessionTrait;

    public $sessions = [];
    public $cancel_id = null;

    public function mount(){
        if(Auth::user()->user_type_id == 2){
            $invited_sessions = Auth::user()->coach->sessions;
            $my_sessions = Auth::user()->sessions;
            $this->sessions = $my_sessions->merge($invited_sessions)->sortByDesc('updated_at');
        }
    }

    public function leaveSession($session_id){
        if(Auth::user()->user_type_id == 2){
            Auth::user()->coach->sessions()->detach($session_id);
            
            //Reload Sessions
            $invited_sessions = Auth::user()->coach->sessions;
            $my_sessions = Auth::user()->sessions;
            $this->sessions = $my_sessions->merge($invited_sessions)->sortByDesc('updated_at');
        }
    }

    public function editSession($id){
        $session = Session::where('user_id', Auth::id())->where('id', $id)->first();
        if($session){
            $this->emit('editSession', $id);
        }
    }

    public function rescheduleSession($id){
        $session = Session::where('user_id', Auth::id())->where('id', $id)->first();
        if($session){
            $this->emit('rescheduleSession', $id);
        }
    }

    public function confirmCancel($id){
        $this->cancel_id = $id;
        $this->dispatchBrowserEvent('openCancelSessionModal');
    }

    public function cancelSession(){
        $session = Session::find($this->cancel_id);
        if($session){
            $session->coaches()->sync([]);
            $session->delete();

            $this->dispatchBrowserEvent('notify', array(
                'type' => 'info',
                'title' => 'Session Cancelled',
                'message' => 'Session cancelled successfully',
            ));
            $this->dispatchBrowserEvent('hideCancelSessionModal');
        }

        if(Auth::user()->user_type_id == 2){
            $invited_sessions = Auth::user()->coach->sessions;
            $my_sessions = Auth::user()->sessions;
            $this->sessions = $my_sessions->merge($invited_sessions)->sortByDesc('updated_at');
        }
    }

    public function render()
    {
        return view('livewire.sessions.sessions');
    }
}
