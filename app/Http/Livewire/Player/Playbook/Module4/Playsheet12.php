<?php

namespace App\Http\Livewire\Player\Playbook\Module4;

use Livewire\Component;
use App\Models\PlayerPlaybook;

class Playsheet12 extends Component
{
    public $playbook_id;
    public $playbook = null;
    public $playsheet = 12;
    public $objective = '';
    public $requirement = '';
    public $learning = '';
    public $work_need = '';
    public $date = '';

    public function mount($playbook_id){
        $this->playbook_id = $playbook_id;

        $this->playbook = PlayerPlaybook::find($this->playbook_id);
        if($this->playbook->response){
            $response = json_decode($this->playbook->response, true);

            if(isset($response['module4']) && isset($response['module4']['playsheet'.$this->playsheet])){
                $this->objective = $response['module4']['playsheet'.$this->playsheet]['objective'];
                $this->requirement = $response['module4']['playsheet'.$this->playsheet]['requirement'];
                $this->learning = $response['module4']['playsheet'.$this->playsheet]['learning'];
                $this->work_need = $response['module4']['playsheet'.$this->playsheet]['work_need'];
                $this->date = $response['module4']['playsheet'.$this->playsheet]['date'];
            }
        }
    }

    public function save(){
        $this->validate([
            'objective' => ['required', 'min:2'],
            'requirement' => ['required', 'min:2'],
            'learning' => ['required', 'min:2'],
            'work_need' => ['required', 'min:2'],
            'date' => ['required', 'date'],
        ]);

        $response = [];
        if($this->playbook->response)
            $response = json_decode($this->playbook->response, true);

        $response['module4']['playsheet'.$this->playsheet] = [
            'objective' => $this->objective,
            'requirement' => $this->requirement,
            'learning' => $this->learning,
            'work_need' => $this->work_need,
            'date' => $this->date,
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
        return view('livewire.player.playbook.module4.playsheet12');
    }
}
