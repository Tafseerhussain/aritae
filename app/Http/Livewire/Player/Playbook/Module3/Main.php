<?php

namespace App\Http\Livewire\Player\Playbook\Module3;

use Livewire\Component;
use App\Models\PlayerPlaybook;

class Main extends Component
{
    protected $listeners = [
        'playsheetSaved',
        'playsheetBack',
    ];

    public $playbook_id;
    public $playbook;
    public $playsheet = 1;
    public $completeness = 0;

    public function mount($playbook_id){
        $this->playbook_id = $playbook_id;
        $this->playsheet = 1;
        $this->playbook = PlayerPlaybook::find($this->playbook_id);

        $this->calculateCompleteness();
    }

    public function playsheetSaved($playsheet){
        if($playsheet < 2){
            $this->playsheet++;
        }
        
        $this->calculateCompleteness();
    }

    public function playsheetBack($playsheet){
        if($playsheet > 1 && $playsheet <= 2)
            $this->playsheet--;
    }

    private function calculateCompleteness(){
        $this->completeness = 0;

        if($this->playbook->response){
            $response = json_decode($this->playbook->response, true);

            if(isset($response['module3']['playsheet1']['home']))
                $this->completeness += 13;
            if(isset($response['module3']['playsheet1']['school']))
                $this->completeness += 13;
            if(isset($response['module3']['playsheet1']['activity']))
                $this->completeness += 13;
            if(isset($response['module3']['playsheet1']['other']))
                $this->completeness += 13;
            if(isset($response['module3']['playsheet2']['objective']))
                $this->completeness += 12;
            if(isset($response['module3']['playsheet2']['requirement']))
                $this->completeness += 12;
            if(isset($response['module3']['playsheet2']['learning']))
                $this->completeness += 12;
            if(isset($response['module3']['playsheet2']['work_need']))
                $this->completeness += 12;
        }
    }

    public function render()
    {
        return view('livewire.player.playbook.module3.main');
    }
}
