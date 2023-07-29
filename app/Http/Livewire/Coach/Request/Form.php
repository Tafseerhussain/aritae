<?php

namespace App\Http\Livewire\Coach\Request;

use Livewire\Component;
use App\Models\HireRequest;
use App\Events\CoachConnect;
use App\Models\User;
use App\Traits\CreateNotification;
use Auth;

class Form extends Component
{
    use CreateNotification;
    
    public $requestTitle;
    public $proposalMessage;

    public $coach_id;
    public $coach;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount($coach_id)
    {
        //session()->put('coach_id', $coach_id);
    }

    public function submit()
    {
        $this->validate([
            'requestTitle' => 'required',
            'proposalMessage' => 'required',
        ]);
        $req = HireRequest::where('player_id', Auth::user()->id)->where('coach_id', $this->coach_id)->first();
        if ($req == null) {
            $request = new HireRequest;
            $request->player_id = Auth::user()->id;
            $request->coach_id = $this->coach_id;
            $request->title = $this->requestTitle;
            $request->message = $this->proposalMessage;
            $request->name = Auth::user()->full_name;
            $request->email = Auth::user()->email;
            $request->save();

            $this->coach = User::find($this->coach_id);

            //Send pusher notification
            broadcast(new CoachConnect(
                Auth()->user(),
                $this->coach,
                'initiated'
            ));

            $this->dispatchBrowserEvent('coach_connect_notification', [
                'title' => 'Requested sent',
                'type' => 'info',
                'message' => 'Your hiring request sent to coach '.$this->coach->full_name,
            ]);

            $this->pushUserNotification(
                $this->coach,
                'coach-hire-request', 
                'New player request', 
                Auth::user()->full_name. ' requested to hire you as a coach',
                Auth::id(),
            );

            $this->reset();
            $this->emit('hiringRequestSent');
            //session()->flash('success_message', 'Request Sent.');
        } else {
            $this->dispatchBrowserEvent('coach_connect_notification', [
                'title' => 'Requested sent',
                'type' => 'warning',
                'message' => 'Your hiring request already sent to coach '.$this->coach->full_name,
            ]);
            //session()->flash('success_message', 'Request already sent.');
        }
        
    }

    public function hideMessage()
    {
        session()->forget('success_message');
    }
    
    public function render()
    {
        return view('livewire.coach.request.form',  [
            'requested' => HireRequest::where('player_id', Auth::user()->id)->where('coach_id', $this->coach_id)->first(),
            'hired' => Auth::user()->player->coaches()->where('user_id', $this->coach_id)->first(),
        ]);
    }
}
