<?php

namespace App\Http\Livewire\Player\Playbook\Module4;

use Livewire\Component;
use App\Models\PlayerPlaybook;

class Playsheet1 extends Component
{
    public $playbook_id;
    public $playbook = null;
    public $playsheet = 1;

    public function mount($playbook_id){
        $this->playbook_id = $playbook_id;

        $this->playbook = PlayerPlaybook::find($this->playbook_id);
        if($this->playbook->response){
            $response = json_decode($this->playbook->response, true);

            if(isset($response['module4']) && isset($response['module4']['playsheet'.$this->playsheet])){
                //Saved data initialization
            }
        }
    }

    public function save(){

        $response = [];
        if($this->playbook->response)
            $response = json_decode($this->playbook->response, true);

        $response['module4']['playsheet'.$this->playsheet] = [
        ];

        $this->playbook->response = json_encode($response);
        $this->playbook->save();

        $this->emit('playsheetSaved', $this->playsheet);
    }

    public function render()
    {
        return view('livewire.player.playbook.module4.playsheet1');
    }
}
