<?php

namespace App\Http\Livewire\Player\Playbook\Module1;

use Livewire\Component;
use App\Models\PlayerPlaybook;

class Playsheet7 extends Component
{
    public $playbook_id;
    public $playbook = null;
    public $playsheet = 7;
    public $home = '';
    public $school = '';
    public $activity = '';
    public $other = '';

    public function mount($playbook_id){
        $this->playbook_id = $playbook_id;

        $this->playbook = PlayerPlaybook::find($this->playbook_id);
        if($this->playbook->response){
            $response = json_decode($this->playbook->response, true);

            if(isset($response['module1']) && isset($response['module1']['playsheet'.$this->playsheet])){
                $this->home = $response['module1']['playsheet'.$this->playsheet]['home'];
                $this->school = $response['module1']['playsheet'.$this->playsheet]['school'];
                $this->activity = $response['module1']['playsheet'.$this->playsheet]['activity'];
                $this->other = $response['module1']['playsheet'.$this->playsheet]['other'];
            }
        }
    }

    public function save(){
        $this->validate([
            'home' => ['required', 'min:2'],
            'school' => ['required', 'min:2'],
            'activity' => ['required', 'min:2'],
            'other' => ['nullable', 'min:2'],
        ]);

        $response = [];
        if($this->playbook->response)
            $response = json_decode($this->playbook->response, true);

        $response['module1']['playsheet'.$this->playsheet] = [
            'home' => $this->home,
            'school' => $this->school,
            'activity' => $this->activity,
            'other' => $this->other,
        ];

        $this->playbook->response = json_encode($response);
        $this->playbook->save();

        $this->emit('playsheetSaved', $this->playsheet);
    }

    public function previous(){
        $this->emit('playsheetBack', $this->playsheet);
    }

    public function render()
    {
        return view('livewire.player.playbook.module1.playsheet7');
    }
}
