<?php

namespace App\Http\Livewire\Player\Playbook\Module2;

use Livewire\Component;
use App\Models\PlayerPlaybook;

class Playsheet1 extends Component
{
    public $playbook_id;
    public $playbook = null;
    public $playsheet = 1;
    public $characteristic = '';
    public $expectation = '';

    public function mount($playbook_id){
        $this->playbook_id = $playbook_id;

        $this->playbook = PlayerPlaybook::find($this->playbook_id);
        if($this->playbook->response){
            $response = json_decode($this->playbook->response, true);

            if(isset($response['module2']) && isset($response['module2']['playsheet'.$this->playsheet])){
                $this->characteristic = $response['module2']['playsheet'.$this->playsheet]['characteristic'];
                $this->expectation = $response['module2']['playsheet'.$this->playsheet]['expectation'];
            }
        }
    }

    public function save(){
        $this->validate([
            'characteristic' => ['required', 'min:2'],
            'expectation' => ['required', 'min:2'],
        ]);

        $response = [];
        if($this->playbook->response)
            $response = json_decode($this->playbook->response, true);

        $response['module2']['playsheet'.$this->playsheet] = [
            'characteristic' => $this->characteristic,
            'expectation' => $this->expectation,
        ];

        $this->playbook->response = json_encode($response);
        $this->playbook->save();

        $this->emit('playsheetSaved', $this->playsheet);
    }

    public function render()
    {
        return view('livewire.player.playbook.module2.playsheet1');
    }
}
