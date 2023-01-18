<?php

namespace App\Http\Livewire\Player;

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

    public $amount = 0;
    public $event_id;
    public $redirect_url;
    public $payment_method = 'card';
    public $card_name;
    public $card_number;
    public $card_date;
    public $card_cvv;

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

        $this->dispatchBrowserEvent('get_stripe_token', [
            'stripe_key' => env('STRIPE_KEY'),
            'number' => $this->card_number,
            'cvc' => $this->card_cvv,
            'exp_month' => $expire[0],
            'exp_year' => $expire[1],
        ]);
    }

    public function processPayment($token){
        $event = Event::where('id', $this->event_id)->where('status', 'active')->first();

        if($event){
            $amount = number_format((float) $this->amount, 2, '.', '');
            $amount = str_replace(".", "", $amount);
            $transaction_id = null;
            $comment = "Event joining fee for Aritae";

            try {
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $transaction = Stripe\Charge::create ([
                    "amount" => $amount,
                    "currency" => "usd",
                    "source" => $token,
                    "description" => $comment,
                ]);
                $transaction_id = $transaction->balance_transaction;

                $card = Card::where('number', $this->card_number)->first();
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

                $event->players()->syncWithoutDetaching(Auth::user()->player->id);

                $this->dispatchBrowserEvent('event_join_notification', [
                    'title' => 'Payment successful',
                    'type' => 'info',
                    'message' => "Event joining fee paid successfully",
                ]);

                $this->dispatchBrowserEvent('redirect_event_page', [
                    'url' => $this->redirect_url,
                ]);

            }catch (Exception $e){
                $this->dispatchBrowserEvent('event_join_notification', [
                    'title' => 'Payment processing error',
                    'type' => 'error',
                    'message' => $e->getMessage(),
                ]);
            }
        }
        else{
            $this->dispatchBrowserEvent('event_join_notification', [
                'title' => 'Invalid event',
                'type' => "error",
                'message' => "Invalid event selected for joining",
            ]);
        }
    }

    public function render()
    {
        return view('livewire.player.payment');
    }
}
