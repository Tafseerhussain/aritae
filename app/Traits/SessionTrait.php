<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\User;

trait SessionTrait {
    public function getTimeRange($time_slot){
        sort($time_slot);
        $time_string = '';

        //Start Time
        $start_time = $time_slot[0];
        $start_time = $start_time > 26 ? ($start_time - 24) : $start_time;

        $time_string .= ($start_time / 2) != 0 ? intval($start_time/2) . ':00 ' : intval($start_time/2) . ':30 ';
        $time_string .= $time_slot[0] > 24 ? 'PM - ' : 'AM - ';
        
        //End Time
        $end_time = $time_slot[count($time_slot) - 1];
        $end_time = $end_time > 26 ? ($end_time - 24) : $end_time;

        $time_string .= ($end_time / 2) == 0 ? intval($end_time/2) . ':29 ' : intval($end_time/2) . ':59 ';
        $time_string .= $time_slot[count($time_slot) - 1] > 24 ? 'PM' : 'AM';
        
        return $time_string;
    }
}