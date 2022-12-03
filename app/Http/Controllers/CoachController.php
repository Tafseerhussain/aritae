<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        return view('profilePreview', compact('user'));
    }
}
