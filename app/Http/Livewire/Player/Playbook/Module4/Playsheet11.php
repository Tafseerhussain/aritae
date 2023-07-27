<?php

namespace App\Http\Livewire\Player\Playbook\Module4;

use Livewire\Component;
use App\Models\PlayerPlaybook;

class Playsheet11 extends Component
{
    public $playbook_id;
    public $playbook = null;
    public $playsheet = 11;
    public $area = '';
    public $date = '';
    public $action1 = '';
    public $action2 = '';
    public $action3 = '';
    public $obstacle1 = '';
    public $obstacle2 = '';
    public $obstacle3 = '';
    public $solution1 = '';
    public $solution2 = '';
    public $solution3 = '';
    public $goal = '';
    public $reward = '';

    public function mount($playbook_id){
        $this->playbook_id = $playbook_id;

        $this->playbook = PlayerPlaybook::find($this->playbook_id);
        if($this->playbook->response){
            $response = json_decode($this->playbook->response, true);

            if(isset($response['module4']) && isset($response['module4']['playsheet'.$this->playsheet])){
                $this->area = $response['module4']['playsheet'.$this->playsheet]['area'];
                $this->date = $response['module4']['playsheet'.$this->playsheet]['date'];
                $this->action1 = $response['module4']['playsheet'.$this->playsheet]['action1'];
                $this->action2 = $response['module4']['playsheet'.$this->playsheet]['action2'];
                $this->action3 = $response['module4']['playsheet'.$this->playsheet]['action3'];
                $this->obstacle1 = $response['module4']['playsheet'.$this->playsheet]['obstacle1'];
                $this->obstacle2 = $response['module4']['playsheet'.$this->playsheet]['obstacle2'];
                $this->obstacle3 = $response['module4']['playsheet'.$this->playsheet]['obstacle3'];
                $this->solution1 = $response['module4']['playsheet'.$this->playsheet]['solution1'];
                $this->solution2 = $response['module4']['playsheet'.$this->playsheet]['solution2'];
                $this->solution3 = $response['module4']['playsheet'.$this->playsheet]['solution3'];
                $this->goal = $response['module4']['playsheet'.$this->playsheet]['goal'];
                $this->reward = $response['module4']['playsheet'.$this->playsheet]['reward'];
            }
        }
    }

    public function save(){
        $this->validate([
            'area' => ['required', 'min:2'],
            'date' => ['required', 'date'],
            'action1' => ['required', 'min:2'],
            'action2' => ['required', 'min:2'],
            'action3' => ['required', 'min:2'],
            'obstacle1' => ['required', 'min:2'],
            'obstacle2' => ['required', 'min:2'],
            'obstacle3' => ['required', 'min:2'],
            'solution1' => ['required', 'min:2'],
            'solution2' => ['required', 'min:2'],
            'solution3' => ['required', 'min:2'],
            'goal' => ['required', 'min:2'],
            'reward' => ['required', 'min:2'],
        ]);

        $response = [];
        if($this->playbook->response)
            $response = json_decode($this->playbook->response, true);

        $response['module4']['playsheet'.$this->playsheet] = [
            'area' => $this->area,
            'date' => $this->date,
            'action1' => $this->action1,
            'action2' => $this->action2,
            'action3' => $this->action3,
            'obstacle1' => $this->obstacle1,
            'obstacle2' => $this->obstacle2,
            'obstacle3' => $this->obstacle3,
            'solution1' => $this->solution1,
            'solution2' => $this->solution2,
            'solution3' => $this->solution3,
            'goal' => $this->goal,
            'reward' => $this->reward,
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
        return view('livewire.player.playbook.module4.playsheet11');
    }
}
