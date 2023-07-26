<?php

namespace App\Http\Livewire\Player\Playbook\Module1;

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
        if($playsheet < 11){
            $this->playsheet++;
        }
        
        $this->calculateCompleteness();
    }

    public function playsheetBack($playsheet){
        if($playsheet > 1 && $playsheet <= 11)
            $this->playsheet--;
    }

    private function calculateCompleteness(){
        $this->completeness = 0;

        if($this->playbook->response){
            $response = json_decode($this->playbook->response, true);

            for($x = 1; $x <= 11; $x++){
                if(isset($response['module1']['playsheet'.$x]['home']))
                    $this->completeness += 3;
                if(isset($response['module1']['playsheet'.$x]['school']))
                    $this->completeness += 3;
                if(isset($response['module1']['playsheet'.$x]['activity']))
                    $this->completeness += 3;
            
                if($x == 11)
                    $this->completeness += 1;
            }
        }
    }

    public function render()
    {
        return view('livewire.player.playbook.module1.main');
    }
}
