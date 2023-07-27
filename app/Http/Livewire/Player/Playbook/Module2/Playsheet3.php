<?php

namespace App\Http\Livewire\Player\Playbook\Module2;

use Livewire\Component;
use App\Models\PlayerPlaybook;

class Playsheet3 extends Component
{
    public $playbook_id;
    public $playbook = null;
    public $playsheet = 3;
    public $draft3 = '';
    public $vision = '';

    public function mount($playbook_id){
        $this->playbook_id = $playbook_id;

        $this->playbook = PlayerPlaybook::find($this->playbook_id);
        if($this->playbook->response){
            $response = json_decode($this->playbook->response, true);

            if(isset($response['module2']) && isset($response['module2']['playsheet'.$this->playsheet])){
                $this->draft3 = $response['module2']['playsheet'.$this->playsheet]['draft3'];
                $this->vision = $response['module2']['playsheet'.$this->playsheet]['vision'];
            }
        }
    }

    public function save(){
        $this->validate([
            'draft3' => ['required', 'min:2'],
            'vision' => ['required', 'min:2'],
        ]);

        $response = [];
        if($this->playbook->response)
            $response = json_decode($this->playbook->response, true);

        $response['module2']['playsheet'.$this->playsheet] = [
            'draft3' => $this->draft3,
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
        return view('livewire.player.playbook.module2.playsheet3');
    }
}
