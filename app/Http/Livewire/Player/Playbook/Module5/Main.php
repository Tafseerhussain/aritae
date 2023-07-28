<?php

namespace App\Http\Livewire\Player\Playbook\Module5;

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
        if($playsheet < 14)
            $this->playsheet++;
        
        $this->calculateCompleteness();

        if($playsheet >= 14 && $this->completeness >= 100){
            $this->playbook->status = 'submitted';
            $this->playbook->save();

            return redirect(route('player.dashboard'))->with('info', 'Playbook submitted successfully.');
        }
    }

    public function playsheetBack($playsheet){
        if($playsheet > 1 && $playsheet <= 14)
            $this->playsheet--;
    }

    private function calculateCompleteness(){
        $this->completeness = 0;

        if($this->playbook->response){
            $response = json_decode($this->playbook->response, true);

            for($x=3; $x<=14; $x++){
                if(isset($response['module5']['playsheet'.$x]['area']) && isset($response['module5']['playsheet'.$x]['date']))
                    $this->completeness += 1;
                if(isset($response['module5']['playsheet'.$x]['action1']) && isset($response['module5']['playsheet'.$x]['obstacle1']) && isset($response['module5']['playsheet'.$x]['solution1']))
                    $this->completeness += 2;
                if(isset($response['module5']['playsheet'.$x]['action2']) && isset($response['module5']['playsheet'.$x]['obstacle2']) && isset($response['module5']['playsheet'.$x]['solution2']))
                    $this->completeness += 2;
                if(isset($response['module5']['playsheet'.$x]['action3']) && isset($response['module5']['playsheet'.$x]['obstacle3']) && isset($response['module5']['playsheet'.$x]['solution3']))
                    $this->completeness += 2;
                if(isset($response['module5']['playsheet'.$x]['goal']) && isset($response['module5']['playsheet'.$x]['reward']))
                    $this->completeness += 1;
            }

            if(isset($response['module5']['playsheet1']['purpose']))
                $this->completeness += 2;
            if(isset($response['module5']['playsheet1']['vision']))
                $this->completeness += 2;
        }
    }

    public function render()
    {
        return view('livewire.player.playbook.module5.main');
    }
}
