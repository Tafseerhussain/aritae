<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Player;
use App\Models\Coach;
use App\Models\HireRequest;
use Auth;

class CoachController extends Controller
{
    public function index()
    {
        return view('coach.dashboard');
    }

    public function profile()
    {
        return view('coach.profile');
    }

    public function profilePreview($id)
    {
        $user = User::findOrFail($id);
        return view('profilePreview', compact('user', 'id'));
    }

    public function requests()
    {
        $requests = HireRequest::where('coach_id', Auth::user()->id)->get();
        return view('coach.requests', compact('requests'));
    }

    public function viewPlayerRequest($id)
    {
        $player = User::findOrFail($id);
        $req = HireRequest::where('player_id', $id)->where('coach_id', Auth::user()->id)->first();
        return view('coach.request-single', compact(['player', 'req']));
    }

    public function deletePlayerRequest($id)
    {
        $req = HireRequest::where('player_id', $id)->where('coach_id', Auth::user()->id)->first();
        $req->delete();
        return redirect()->route('coach.requests')->with('success_message', 'Request Declined and Deleted!');
    }

    public function acceptPlayerRequest($id)
    {
        $coach = Coach::where('user_id', Auth::user()->id)->first();
        $player = Player::where('user_id', $id)->first();
        $player->coaches()->attach($coach);

        $req = HireRequest::where('player_id', $id)->where('coach_id', Auth::user()->id)->first();
        $req->delete();
        return redirect()->route('coach.requests')->with('success_message', 'Request accepted and added player to your list!');
    }

    public function coachChat()
    {
        return view('coach.messages');
    }
}
