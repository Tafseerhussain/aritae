<?php

namespace App\Http\Livewire\Event;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Event;
use Auth;

class CreateEvent extends Component
{
    use WithFileUploads;

    public $eventName;
    public $eventStart;
    public $eventEnd;
    public $eventCity;
    public $eventState;
    public $eventURL = null;
    public $eventType = 'paid';
    public $eventPrice = null;
    public $eventDescription;
    public $eventCover;

    public function submitEvent(){
        $this->validate([
            'eventName' => ['required', 'string', 'min:3'],
            'eventStart' => ['required', 'date', 'after:now'],
            'eventEnd' => ['required', 'date', 'after:now'],
            'eventCity' => ['required', 'string', 'min:3'],
            'eventState' => ['required', 'string'],
            'eventURL' => ['nullable', 'string'],
            'eventType' => ['required', 'in:free,paid'],
            'eventPrice' => [($this->eventType == 'paid') ? 'required' : 'nullable'],
            'eventDescription' => ['required', 'string', 'min:3'],
            'eventCover' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ]);

        $imageName = time().'_'.str_replace(' ', '_', $this->eventCover->getClientOriginalName());     
        $this->eventCover->storeAs('public/images/event_cover', $imageName);

        $event = Event::create([
            'name' => $this->eventName,
            'start' => $this->eventStart,
            'end' => $this->eventEnd,
            'city' => $this->eventCity,
            'state' => $this->eventState,
            'url' => $this->eventURL,
            'type' => $this->eventType,
            'price' => $this->eventPrice,
            'description' => $this->eventDescription,
            'cover_image' => $imageName,
            'coach_id' => Auth::user()->coach->id,
        ]);

        $this->emit('eventCreated');
    }

    public function cancelEvent(){
        $this->emit('eventCancelled');
    }

    public function render()
    {
        return view('livewire.event.create-event');
    }
}
