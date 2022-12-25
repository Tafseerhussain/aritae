<?php

namespace App\Http\Livewire\Player\Profile;

use Livewire\Component;
use App\Models\Player\PlayerAthleticInformation;
use Auth;

class AthleticInformation extends Component
{
    public $foot;
    public $inches;
    public $weight;

    public function submit()
    {
        $this->validate([
            'foot' => 'required|integer|min:2',
            'inches' => 'required|integer|min:0',
            'weight' => 'required|integer|min:20',
        ]);

        PlayerAthleticInformation::updateOrCreate(
            ['player_id' => Auth::user()->player->id],
            [
                'player_id' => Auth::user()->player->id,
                'height_ft' => $this->foot,
                'height_inch' => $this->inches,
                'weight' => $this->weight,
            ]
        );

        //Emit score update
        $this->emit('shouldUpdateScore');

        session()->flash('success_message', 'Information Updated.');
    }

    public function hideMessage()
    {
        session()->forget('success_message');
    }
    
    public function render()
    {
        $player = PlayerAthleticInformation::where('player_id', Auth::user()->player->id)->first();
        if ($player != null) {
            $this->foot = $player->height_ft;
            $this->inches = $player->height_inch;
            $this->weight = $player->weight;
        }
        return view('livewire.player.profile.athletic-information');
    }
}
