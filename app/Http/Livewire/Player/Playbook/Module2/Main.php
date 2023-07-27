<?php

namespace App\Http\Livewire\Player\Playbook\Module2;

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
        if($playsheet < 5){
            $this->playsheet++;
        }
        
        $this->calculateCompleteness();
    }

    public function playsheetBack($playsheet){
        if($playsheet > 1 && $playsheet <= 5)
            $this->playsheet--;
    }

    private function calculateCompleteness(){
        $this->completeness = 0;

        if($this->playbook->response){
            $response = json_decode($this->playbook->response, true);

            if(isset($response['module2']['playsheet1']['characteristic']))
                $this->completeness += 10;
            if(isset($response['module2']['playsheet1']['expectation']))
                $this->completeness += 10;
            if(isset($response['module2']['playsheet2']['draft1']))
                $this->completeness += 10;
            if(isset($response['module2']['playsheet2']['draft2']))
                $this->completeness += 10;
            if(isset($response['module2']['playsheet3']['draft3']))
                $this->completeness += 10;
            if(isset($response['module2']['playsheet3']['vision']))
                $this->completeness += 10;
            if(isset($response['module2']['playsheet4']['purpose']))
                $this->completeness += 10;
            if(isset($response['module2']['playsheet4']['vision']))
                $this->completeness += 10;
            if(isset($response['module2']['playsheet5']['objective']))
                $this->completeness += 5;
            if(isset($response['module2']['playsheet5']['requirement']))
                $this->completeness += 5;
            if(isset($response['module2']['playsheet5']['learning']))
                $this->completeness += 5;
            if(isset($response['module2']['playsheet5']['work_need']))
                $this->completeness += 5;
        }
    }

    public function render()
    {
        return view('livewire.player.playbook.module2.main');
    }
}
