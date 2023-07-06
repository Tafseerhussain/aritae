<?php

namespace App\Http\Livewire\Sessions;

use Livewire\Component;
use App\Traits\SessionTrait;
use App\Models\Session;
use Auth;

class UpcomingSessions extends Component
{
    use SessionTrait;

    public $sessions = [];
    public $week_day = '';
    public $cancel_id = null;

    public function mount(){
        $this->sessions = Session::where('date', '>', time())
            ->where('date', '<', strtotime('+7 days'))
            ->where('cancelled', 0)
            ->orderBy('date', 'ASC')->get();
    }

    public function updateWeekDay($day){
        $today = date('l', strtotime('today'));
        $start_time = strtotime('today');
        $end_time = $start_time + 86400;
        if($day != $today){
            $start_time = strtotime('next '.$day);
            $end_time = $start_time + 86400;
        }

        $this->week_day = $day;
        $this->sessions = Session::where('date', '>', $start_time)
            ->where('date', '<', $end_time)
            ->where('cancelled', 0)
            ->orderBy('date', 'ASC')->get();
    }

    public function joinSession($session_id){
        $this->emit('joinSession', $session_id);
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
        return view('livewire.sessions.upcoming-sessions');
    }
}
