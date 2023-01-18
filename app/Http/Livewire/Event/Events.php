<?php

namespace App\Http\Livewire\Event;

use Livewire\Component;
use App\Models\Event;
use Auth;

class Events extends Component
{
    public $events;
    public $filter = 'all';
    public $sort = 'name';
    public $delete_id = '';

    public function mount(){
        $this->events = Event::where('status', 'active')->get()->sortBy($this->sort);
    }

    public function applyFilter($filter){
        $this->filter = $filter;

        if($filter == 'all'){
            $this->events = Event::where('status', 'active')->get()->sortBy($this->sort);
        }
        if($filter == 'my-events'){
            $this->events = Auth::user()->coach->events()->where('status', 'active')->get()->sortBy($this->sort);
        }
        if($filter == 'upcoming'){
            $this->events = Event::where('start', '>=', date('Y-m-d'))->where('status', 'active')->get()->sortBy($this->sort);
        }
        if($filter == 'past'){
            $this->events = Event::where('start', '<=', date("Y-m-d"))->where('status', 'active')->get()->sortBy($this->sort);
        }
        if($filter == 'pending'){
            $this->events = Event::where('status', 'pending')->get()->sortBy($this->sort);
        }
    }

    public function applySort(){
        $this->events->sortBy($this->sort);
    }

    public function showCreateEvent(){
        $this->emit('showCreateEvent');
    }

    public function showDetail($event){
        $this->emit('showDetail', $event);
    }

    public function approveEvent($id){
        $event = Event::find($id);
        $event->status = 'active';
        $event->save();

        //Reload events
        $this->applyFilter($this->filter);
    }

    public function deleteEvent($id){
        $this->delete_id = $id;

        $this->dispatchBrowserEvent('openDeleteModal');
    }
    public function confirmDelete(){
        $event = Event::find($this->delete_id);
        $event->delete();

        //Reload events
        $this->applyFilter($this->filter);

        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    public function render()
    {
        return view('livewire.event.events', ['events' => $this->events]);
    }
}
