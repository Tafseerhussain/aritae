<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Player;
use App\Models\Coach;
use App\Models\HireRequest;
use App\Models\TeamRequest;
use App\Models\Team;
use App\Models\Chat\Conversation;
use App\Events\CoachConnect;
use Auth;

class CoachController extends Controller
{
    public function index()
    {
        $conversations = Conversation::where('sender_id', Auth::user()->id)->orderBy('last_time_message', 'DESC')->take(3)->get();
        return view('coach.dashboard', compact('conversations'));
    }

    public function registrationComplete()
    {
        return view('coach.registration-complete');
    }

    public function profile()
    {
        return view('coach.profile');
    }

    public function settings()
    {
        return view('coach.settings');
    }

    public function profilePreview($id)
    {
        $user = User::findOrFail($id);
        return view('coach-profile-view', compact('user', 'id'));
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
        $coach = Coach::where('user_id', Auth::user()->id)->first();
        $player = Player::where('user_id', $id)->first();

        $req = HireRequest::where('player_id', $id)->where('coach_id', Auth::user()->id)->first();
        $req->delete();

        //Send pusher notification
        broadcast(new CoachConnect(
            $coach->user,
            $player->user,
            'declined'
        ));

        return redirect()->route('coach.requests')->with('success_message', 'Request Declined and Deleted!');
    }

    public function acceptPlayerRequest($id)
    {
        $coach = Coach::where('user_id', Auth::user()->id)->first();
        $player = Player::where('user_id', $id)->first();
        $player->coaches()->attach($coach);

        $req = HireRequest::where('player_id', $id)->where('coach_id', Auth::user()->id)->first();
        $req->delete();

        //Send pusher notification
        broadcast(new CoachConnect(
            $coach->user,
            $player->user,
            'accepted'
        ));

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

    public function events()
    {
        return view('coach.events');
    }

    public function teams()
    {
        return view('coach.teams');
    }

    public function teamRequests()
    {
        $team_requests = TeamRequest::where('user_id', Auth::user()->id)
        ->whereHas('team', function($query){
            $query->where('status', 'active');
        })->get();
        return view('coach.team-requests', compact('team_requests'));
    }

    public function teamRequestAccept($team_id)
    {
        $team_request = TeamRequest::where('user_id', Auth::user()->id)->where('team_id', $team_id)->first();
        $team = Team::find($team_id);
        $coach = Auth::user()->coach;

        if($team_request){
            $team->coaches()->syncWithoutDetaching([$coach->id]);

            $team_request->delete();

            return redirect(route('coach.teams'));
        }

        return redirect()->back();
    }

    public function teamRequestDecline($team_id)
    {
        $team_request = TeamRequest::where('user_id', Auth::user()->id)->where('team_id', $team_id)->first();
        if($team_request){
            $team_request->delete();
        }

        return redirect()->back();
    }

    public function allSessions()
    {
        return view('coach.sessions');
    }

    public function playbook()
    {
        return view('coach.playbook');
    }
}
