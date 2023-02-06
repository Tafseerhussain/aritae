<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Event;

class Calendar extends Component
{
    protected $listeners = [
        'event_deleted' => '$refresh',
    ];

    public $events;
    public $eventId;

    public function mount(){
        $event_array = $this->getEvents();
        $this->events = json_encode($event_array);
    }

    public function deleteEvent($formData){
        if($formData['event_id']){
            $event = Event::find($formData['event_id']);
            $event->delete();

            $event_array = $this->getEvents();
            $this->events = json_encode($event_array);
        }

        $this->dispatchBrowserEvent('close_event_detail_modal');
    }

    public function getEvents(){
        $event_array = [];
        $events = Event::all();
        foreach($events as $event){
            array_push($event_array, array(
                'id' => $event->id,
                'title' => $event->name,
                'start' => $event->start,
                'end' => $event->end,
                'type' => $event->type,
                'price' => $event->price,
                'city' => $event->city,
                'state' => $event->state,
                'description' => $event->description,
                'coach' => $event->coach->name,
                'coach_image' => $event->coach->profile_img ? asset($event->coach->profile_img) : asset('assets/img/default/default-profile-pic.jpg'),
                'coach_url' => route('coach.profile.preview', ['id' => $event->coach->id]),
            ));
        }

        return $event_array;
    }

    public function render()
    {
        return view('livewire.admin.calendar', ['events' => $this->events]);
    }
}
