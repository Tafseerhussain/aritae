<?php

namespace App\Http\Livewire\Player\Playbook\Module2;

use Livewire\Component;
use App\Models\PlayerPlaybook;

class Playsheet2 extends Component
{
    public $playbook_id;
    public $playbook = null;
    public $playsheet = 2;
    public $draft1 = '';
    public $draft2 = '';

    public function mount($playbook_id){
        $this->playbook_id = $playbook_id;

        $this->playbook = PlayerPlaybook::find($this->playbook_id);
        if($this->playbook->response){
            $response = json_decode($this->playbook->response, true);

            if(isset($response['module2']) && isset($response['module2']['playsheet'.$this->playsheet])){
                $this->draft1 = $response['module2']['playsheet'.$this->playsheet]['draft1'];
                $this->draft2 = $response['module2']['playsheet'.$this->playsheet]['draft2'];
            }
        }
    }

    public function save(){
        $this->validate([
            'draft1' => ['required', 'min:2'],
            'draft2' => ['required', 'min:2'],
        ]);

        $response = [];
        if($this->playbook->response)
            $response = json_decode($this->playbook->response, true);

        $response['module2']['playsheet'.$this->playsheet] = [
            'draft1' => $this->draft1,
            'draft2' => $this->draft2,
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
        return view('livewire.player.playbook.module2.playsheet2');
    }
}
