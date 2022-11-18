<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function index()
    {
        return view('coach.dashboard');
    }

    public function profile()
    {
        return view('coach.profile.personalInfo');
    }
}
