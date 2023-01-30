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

    //Teams
    public $teams = [];
    public $teamSuggestion = [];
    public $teamName;

    public function teamSuggestion(){
        if(strlen($this->teamName) > 1){
            $teams = array();

            $own_teams = Auth::user()->coach->own_teams()
                ->where('status', 'active')
                ->where('name', 'LIKE', '%'.$this->teamName.'%')
                ->limit(5)->get();

            $coach_teams = Auth::user()->coach->teams()
                ->where('status', 'active')
                ->where('name', 'LIKE', '%'.$this->teamName.'%')
                ->limit(5)->get();
            
            foreach($own_teams as $team){
                array_push($teams, array(
                    'name' => $team->name,
                    'logo' => $team->logo,
                    'id' => $team->id
                ));
            }

            foreach($coach_teams as $team){
                array_push($teams, array(
                    'name' => $team->name,
                    'logo' => $team->logo,
                    'id' => $team->id
                ));
            }

            $this->teamSuggestion = $teams;
        }
        else{
            $this->teamSuggestion = [];
        }
    }

    public function addTeam($name, $logo, $id){
        $team_exists = false;

        foreach($this->teams as $team){
            if($team['id'] == $id)
                $team_exists = true;
        }

        if(!$team_exists){
            array_push($this->teams, array(
                'name' => $name,
                'logo' => $logo,
                'id' => $id,
            ));
        }

        $this->dispatchBrowserEvent('closeTeamModal');
        $this->teamSuggestion = [];
        $this->teamName = '';
    }

    public function deleteTeam($id){
        foreach($this->teams as $key => $team){
            if($team['id'] == $id)
                unset($this->teams[$key]);
        }
    }

    public function openTeamModal(){
        $this->dispatchBrowserEvent('openTeamModal');
    }
    public function closeTeamModal(){
        $this->dispatchBrowserEvent('closeTeamModal');
    }

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

        if(count($this->teams) > 0){
            $team_ids = [];
            foreach($this->teams as $team)
                array_push($team_ids, $team['id']);

            $event->teams()->syncWithoutDetaching($team_ids);
        }

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
