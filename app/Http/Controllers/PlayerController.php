<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Player;
use App\Models\Coach;
use App\Models\HireRequest;
use Auth;

class PlayerController extends Controller
{
    public function index()
    {
        return view('player.dashboard');
    }

    public function profile()
    {
        return view('player.profile');
    }

    public function playerChat()
    {
        $player = Player::where('user_id',Auth::user()->id)->first();
        return view('player.messages');
    }
    public function chatPlayers()
    {
        return view('player.chat-users');
    }

    public function payment(Request $request){
        return view('player.payment', [
            'amount' => $request->amount,
            'event_id' => $request->event_id,
            'redirect_url' => $request->redirect_url,
        ]);
    }
}
