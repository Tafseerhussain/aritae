<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Player;
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
        return view('coach.request-single', compact('player'));
    }
}
