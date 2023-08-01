<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\HireRequest;
use App\Models\TeamRequest;
use Route;

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
            
            //Check admin approval
            if(!Route::is('coach.registrationComplete')){
                if(Auth::user()->coach->participation){
                    if(Auth::user()->coach->participation->approval == 'submitted'){
                        return redirect(route('coach.registrationComplete'))->with("info", "Your response is submitted, we'll get back to you soon");
                    }
                    else if(Auth::user()->coach->participation->approval == 'declined'){
                        Auth::logout();
                        return redirect('/login')->with("error", "Your application was declined!");
                    }
                    else if(Auth::user()->coach->participation->approval == 'approved'){
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
                }
                else return redirect(route('coach.registrationComplete'));
            }
            else{
                if(Auth::user()->coach->participation){
                    if(Auth::user()->coach->participation->approval == 'approved'){
                        return redirect(route('coach.dashboard'))->with("info", "Your application already approved!");
                    }
                    else if(Auth::user()->coach->participation->approval == 'declined'){
                        Auth::logout();
                        return redirect('/login')->with("error", "Your application was declined!");
                    }
                }
                return $next($request);
            }
        }
        abort(404);
    }
}
