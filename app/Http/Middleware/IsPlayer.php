<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\TeamRequest;
use Auth;

class IsPlayer
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
        if (Auth::user() &&  Auth::user()->user_type_id == 4) {
            $teamRequestCount = count(TeamRequest::where('user_id' , Auth::user()->id)
                ->whereHas('team', function($query){
                    $query->where('status', 'active');
                }
            )->get());
            $playbookRequestCount = Auth::user()->player->player_playbooks()
            ->where('status', 'requested')->count();
            \View::share('team_request_count', $teamRequestCount);
            \View::share('playbook_request_count', $playbookRequestCount);
                
            return $next($request);
         }
        abort(404);
    }
}
