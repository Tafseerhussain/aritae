<?php

namespace App\Http\Livewire\Coach\Request;

use Livewire\Component;
use App\Models\HireRequest;
use App\Events\CoachConnect;
use App\Models\User;
use Auth;

class Form extends Component
{
    public $requestTitle;
    public $proposalMessage;

    public $coach_id;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount($coach_id)
    {
        session()->put('coach_id', $coach_id);
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

            $coach = User::find($this->coach_id);

            //Send pusher notification
            broadcast(new CoachConnect(
                Auth()->user(),
                $coach,
                'initiated'
            ));

            $this->dispatchBrowserEvent('coach_connect_notification', [
                'title' => 'Requested sent',
                'type' => 'info',
                'message' => 'Your hiring request sent to coach '.$coach->full_name,
            ]);

            $this->reset();
            session()->flash('success_message', 'Request Sent.');
        } else {
            session()->flash('success_message', 'Request already sent.');
        }
        
    }

    public function hideMessage()
    {
        session()->forget('success_message');
    }
    
    public function render()
    {
        return view('livewire.coach.request.form',  [
            'requested' => HireRequest::where('player_id', Auth::user()->id)->where('coach_id', session('coach_id'))->first(),
        ]);
    }
}
