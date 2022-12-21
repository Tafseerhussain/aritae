<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
