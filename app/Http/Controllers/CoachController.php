<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Player;
use App\Models\Coach;
use App\Models\HireRequest;
use App\Models\Chat\Conversation;
use Auth;

class CoachController extends Controller
{
    public function index()
    {
        $conversations = Conversation::where('sender_id', Auth::user()->id)->orderBy('last_time_message', 'DESC')->take(3)->get();
        return view('coach.dashboard', compact('conversations'));
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
        $coach = Coach::where('user_id',Auth::user()->id)->first();
        $totalUsers = count($coach->players);
        return view('coach.messages', compact('totalUsers'));
    }
    public function chatUsers()
    {
        return view('coach.chat-users');
    }
}
