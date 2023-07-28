<?php

namespace App\Http\Livewire\Player\Playbook\Module5;

use Livewire\Component;
use App\Models\PlayerPlaybook;

class Playsheet1 extends Component
{
    public $playbook_id;
    public $playbook = null;
    public $playsheet = 1;
    public $purpose = '';
    public $vision = '';

    public function mount($playbook_id){
        $this->playbook_id = $playbook_id;

        $this->playbook = PlayerPlaybook::find($this->playbook_id);
        if($this->playbook->response){
            $response = json_decode($this->playbook->response, true);

            if(isset($response['module5']) && isset($response['module5']['playsheet'.$this->playsheet])){
                $this->purpose = $response['module5']['playsheet'.$this->playsheet]['purpose'];
                $this->vision = $response['module5']['playsheet'.$this->playsheet]['vision'];
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

        $response['module5']['playsheet'.$this->playsheet] = [
            'purpose' => $this->purpose,
            'vision' => $this->vision,
        ];

        $this->playbook->response = json_encode($response);
        $this->playbook->save();

        $this->emit('playsheetSaved', $this->playsheet);
    }

    public function render()
    {
        return view('livewire.player.playbook.module5.playsheet1');
    }
}
