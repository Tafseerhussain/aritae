<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coach;

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
    public function settings()
    {
        return view('admin.settings');
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
    public function contact()
    {
        return view('admin.contact');
    }
    public function calendar()
    {
        return view('admin.calendar');
    }
    public function notification()
    {
        return view('admin.notification');
    }
    public function blog()
    {
        return view('admin.blog');
    }
    public function coachApproval($id = null)
    {
        if($id){
            $coach = Coach::find($id);
            if($coach && $coach->participation && $coach->participation->approval == 'submitted')
                return view('admin.coach-approval', ['coach_id' => $id]);
            else abort(404);
        }
        else
            return view('admin.coach-approval', ['coach_id' => $id]);
    }

    public function playbook($id)
    {
        return view('admin.playbook', ['coach_id' => $id]);
    }
}
