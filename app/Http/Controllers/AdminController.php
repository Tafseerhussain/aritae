<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        return view('admin.profile');
    }
    public function sports()
    {
        return view('admin.sports');
    }
    public function events()
    {
        return view('admin.events');
    }
    public function teams()
    {
        return view('admin.teams');
    }
    public function users()
    {
        return view('admin.users');
    }
    public function calendar()
    {
        return view('admin.calendar');
    }
}
