<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use App\Models\Card;
use App\Models\Transaction;
use App\Models\Event;
use Stripe;
use Exception;
use Auth;

class Payment extends Component
{
    protected $listeners = ['received_stripe_token' => 'processPayment'];

    public $available_cards;

    public $amount = 1;
    public $event_id;
    public $redirect_url;
    public $payment_method = 'card';
    public $card_name;
    public $card_number;
    public $card_date;
    public $card_cvv;

    public function mount(){
        $this->available_cards = Auth::user()->cards;
    }

    public function submitPayment(){
        $validate = $this->validate([
            'amount' => 'required|numeric|gt:0',
            'payment_method' => 'required|in:card',
            'card_name' => 'required|min:3',
            'card_number' => 'required|digits:16',
            'card_date' => ['required', 'regex:/^(0[1-9]|1[0-2])\/([0-9]{2})$/'],
            'card_cvv' => 'required|digits:3',
        ]);

        $expire = explode("/", $this->card_date);

        if(Auth::user()->cards()->where('number', $this->card_number)->first()){
            $this->dispatchBrowserEvent('notify', [
                'title' => 'Card already attached.',
                'type' => 'info',
                'message' => "This card already attached to your account!",
            ]);

            //Reset values
            $this->card_name = "";
            $this->card_number = "";
            $this->card_date = "";
            $this->card_cvv = "";
        }
        else{
            $this->dispatchBrowserEvent('get_stripe_token', [
                'stripe_key' => env('STRIPE_KEY'),
                'number' => $this->card_number,
                'cvc' => $this->card_cvv,
                'exp_month' => $expire[0],
                'exp_year' => $expire[1],
            ]);
        }
    }

    public function processPayment($token){
        $amount = number_format((float) $this->amount, 2, '.', '');
        $amount = str_replace(".", "", $amount);
        $transaction_id = null;
        $comment = "Aritae card verification charge";

        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $transaction = Stripe\Charge::create ([
                "amount" => $amount,
                "currency" => "usd",
                "source" => $token,
                "description" => $comment,
            ]);
            $transaction_id = $transaction->balance_transaction;

            $card = Auth::user()->cards()->where('number', $this->card_number)->first();
            if(!$card){
                $card = Card::create([
                    'user_id' => Auth::id(),
                    'name' => $this->card_name,
                    'number' => $this->card_number,
                    'expire_date' => $this->card_date,
                    'cvv' => $this->card_cvv,
                ]);
            }

            $transaction = Transaction::create([
                'card_id' => $card->id,
                'transaction_id' => $transaction_id,
                'amount' => $this->amount,
                'comment' => $comment,
            ]);

            $this->dispatchBrowserEvent('notify', [
                'title' => 'Card Added successfully',
                'type' => 'info',
                'message' => "Card verification successful and linked to your account",
            ]);
        }catch (Exception $e){
            $this->dispatchBrowserEvent('notify', [
                'title' => 'Payment processing error',
                'type' => 'error',
                'message' => $e->getMessage(),
            ]);
        }

        $this->available_cards = Auth::user()->cards;

        //Reset values
        $this->card_name = "";
        $this->card_number = "";
        $this->card_date = "";
        $this->card_cvv = "";
    }

    public function deleteCard($id){
        $card = Auth::user()->cards()->where('id', $id)->first();
        if($card){
            $card->delete();

            $this->dispatchBrowserEvent('notify', [
                'title' => 'Card removed successfully',
                'type' => 'info',
                'message' => 'Selected card removed form your account',
            ]);
        }

        $this->available_cards = Auth::user()->cards;
    }

    public function render()
    {
        return view('livewire.settings.payment');
    }
}
