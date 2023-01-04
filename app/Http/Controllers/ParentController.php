<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ParentController extends Controller
{
    public function index()
    {
        return view('parent.dashboard');
    }

    public function profile()
    {
        return view('parent.profile');
    }

    public function player()
    {
        return view('parent.player');
    }

    public function parentChat()
    {
        $coach_array = array();
        $coach_ids = array();
        $parent = Auth::user()->parent;
        foreach($parent->players as $player){
            foreach($player->coaches as $coach){
                if(!in_array($coach->id, $coach_ids)){
                    array_push($coach_array, $coach);
                    array_push($coach_ids, $coach->id);
                }
            }
        }

        $totalUsers = count($coach_array);
        return view('parent.messages', compact('totalUsers'));
    }
}
