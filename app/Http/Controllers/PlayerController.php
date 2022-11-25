<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
