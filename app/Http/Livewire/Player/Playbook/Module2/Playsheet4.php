<?php

namespace App\Http\Livewire\Player\Playbook\Module2;

use Livewire\Component;
use App\Models\PlayerPlaybook;

class Playsheet4 extends Component
{
    public $playbook_id;
    public $playbook = null;
    public $playsheet = 4;
    public $purpose = '';
    public $vision = '';

    public function mount($playbook_id){
        $this->playbook_id = $playbook_id;

        $this->playbook = PlayerPlaybook::find($this->playbook_id);
        if($this->playbook->response){
            $response = json_decode($this->playbook->response, true);

            if(isset($response['module2']) && isset($response['module2']['playsheet'.$this->playsheet])){
                $this->purpose = $response['module2']['playsheet'.$this->playsheet]['purpose'];
                $this->vision = $response['module2']['playsheet'.$this->playsheet]['vision'];
            }
        }
    }

    public function save(){
        $this->validate([
            'purpose' => ['required', 'min:2'],
            'vision' => ['required', 'min:2'],
        ]);

        $response = [];
        if($this->playbook->response)
            $response = json_decode($this->playbook->response, true);

        $response['module2']['playsheet'.$this->playsheet] = [
            'purpose' => $this->purpose,
            'vision' => $this->vision,
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
        return view('livewire.player.playbook.module2.playsheet4');
    }
}
