<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\HireRequest;
use App\Models\TeamRequest;

class IsCoach
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->user_type_id == 2) {
                $hireCount = count(HireRequest::where('coach_id' , Auth::user()->id)->get());
                $teamRequestCount = count(
                    TeamRequest::where('user_id' , Auth::user()->id)
                    ->whereHas('team', function($query){
                        $query->where('status', 'active');
                    }
                )->get());
                \View::share('hire_count', $hireCount);
                \View::share('team_request_count', $teamRequestCount);
                return $next($request);
         }
        abort(404);
    }
}
