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
        $event = Event::where('id', $id)->where('status', 'active')->first();

        if(!$event)
            abort(404);

        return view('event-detail', ['event' => $event]);
    }
}
