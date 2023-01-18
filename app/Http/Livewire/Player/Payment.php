<?php

namespace App\Http\Livewire\Player;

use Livewire\Component;

class Payment extends Component
{
    public $amount = 0;
    public $payment_method = 'card';
    public $card_name;
    public $card_number;

    public function render()
    {
        return view('livewire.player.payment');
    }
}
