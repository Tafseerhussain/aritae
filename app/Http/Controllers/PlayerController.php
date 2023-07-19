<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Player;
use App\Models\Coach;
use App\Models\HireRequest;
use App\Models\TeamRequest;
use App\Models\Team;
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

    public function settings()
    {
        return view('player.settings');
    }

    public function profilePreview($id)
    {
        $user = User::findOrFail($id);
        return view('player-profile-view', compact('user', 'id'));
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

    public function teams()
    {
        return view('player.teams');
    }

    public function payment(Request $request){
        return view('player.payment', [
            'amount' => $request->amount,
            'event_id' => $request->event_id,
            'redirect_url' => $request->redirect_url,
        ]);
    }

    public function teamRequests()
    {
        $team_requests = TeamRequest::where('user_id', Auth::user()->id)
        ->whereHas('team', function($query){
            $query->where('status', 'active');
        })->get();
        return view('player.team-requests', compact('team_requests'));
    }

    public function teamRequestAccept($team_id)
    {
        $team_request = TeamRequest::where('user_id', Auth::user()->id)->where('team_id', $team_id)->first();
        $team = Team::find($team_id);
        $player = Auth::user()->player;

        if($team_request){
            $team->players()->syncWithoutDetaching([ 
                $player->id => [
                    'position' => $team_request->position,
                    'jersey' => $team_request->jersey,
                ]
            ]);

            $team_request->delete();
            
            //Hire coach
            $player->coaches()->syncWithoutDetaching($team->creator->id);

            return redirect(route('player.teams'));
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
        return view('player.sessions');
    }

    public function playbook()
    {
        return view('player.playbook.index');
    }

    public function playbookModule1()
    {
        return view('player.playbook.module-1');
    }
}
