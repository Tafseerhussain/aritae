<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(){
        return view('all-events');
    }

    public function eventDetail($id){
        $event = Event::find($id);

        return view('event-detail', ['event' => $event]);
    }
}
