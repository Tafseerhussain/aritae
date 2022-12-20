<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\StartAudioChat;
use App\Events\StartVideoChat;
use Auth;

class CallController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        $turn = (object) array(
            'url' => env('TURN_SERVER_URL'),
            'username' => env('TURN_SERVER_USERNAME'),
            'credential' => env('TURN_SERVER_CREDENTIAL')
        );
        return view('call', ['turn' => $turn]);
    }

    public function videoCall(Request $request){
        $turn = (object) array(
            'url' => env('TURN_SERVER_URL'),
            'username' => env('TURN_SERVER_USERNAME'),
            'credential' => env('TURN_SERVER_CREDENTIAL')
        );
        return view('video-call', ['turn' => $turn]);
    }

    public function callUser(Request $request){
        $data['userToCall'] = $request->user_to_call;
        $data['signalData'] = $request->signal_data;
        $data['from'] = Auth::id();
        $data['partnerName'] = Auth::user()->full_name;
        $data['type'] = 'incomingCall';
        broadcast(new StartAudioChat($data))->toOthers();
    }

    public function acceptCall(Request $request){
        $data['signal'] = $request->signal;
        $data['to'] = $request->to;
        $data['type'] = 'callAccepted';
        broadcast(new StartAudioChat($data))->toOthers();
    }

    public function VideoCallUser(Request $request){
        $data['userToCall'] = $request->user_to_call;
        $data['signalData'] = $request->signal_data;
        $data['from'] = Auth::id();
        $data['partnerName'] = Auth::user()->full_name;
        $data['type'] = 'incomingCall';
        broadcast(new StartVideoChat($data))->toOthers();
    }

    public function acceptVideoCall(Request $request){
        $data['signal'] = $request->signal;
        $data['to'] = $request->to;
        $data['type'] = 'callAccepted';
        broadcast(new StartVideoChat($data))->toOthers();
    }
}
