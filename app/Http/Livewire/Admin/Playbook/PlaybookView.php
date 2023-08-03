<?php

namespace App\Http\Livewire\Admin\Playbook;

use Livewire\Component;
use App\Models\PlayerPlaybook;

class PlaybookView extends Component
{
    public $playbook_id;
    public $playbook;
    public $response = null;

    public function mount($playbook_id){
        $this->playbook_id = $playbook_id;
        $this->playbook = PlayerPlaybook::where('id', $this->playbook_id)->first();
        if($this->playbook){
            $this->response = json_decode($this->playbook->response, true);
        }
    }

    public function back(){
        $this->emit('back');
    }

    public function render()
    {
        return view('livewire.admin.playbook.playbook-view');
    }
}
