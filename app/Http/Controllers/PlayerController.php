<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Player;
use App\Models\Coach;
use App\Models\HireRequest;
use App\Models\TeamRequest;
use App\Models\Team;
use App\Models\PlayerPlaybook;
use Auth;

class PlayerController extends Controller
{
    public function index()
    {
        return view('player.dashboard');
    }

    public function profile()
    {
        return view('player.profile');
    }

    public function settings()
    {
        return view('player.settings');
    }

    public function profilePreview($id)
    {
        $user = User::findOrFail($id);
        return view('player-profile-view', compact('user', 'id'));
    }

    public function playerChat()
    {
        $player = Player::where('user_id',Auth::user()->id)->first();
        return view('player.messages');
    }
    public function chatPlayers()
    {
        return view('player.chat-users');
    }

    public function teams()
    {
        return view('player.teams');
    }

    public function payment(Request $request){
        return view('player.payment', [
            'amount' => $request->amount,
            'event_id' => $request->event_id,
            'redirect_url' => $request->redirect_url,
        ]);
    }

    public function teamRequests()
    {
        $team_requests = TeamRequest::where('user_id', Auth::user()->id)
        ->whereHas('team', function($query){
            $query->where('status', 'active');
        })->get();
        return view('player.team-requests', compact('team_requests'));
    }

    public function teamRequestAccept($team_id)
    {
        $team_request = TeamRequest::where('user_id', Auth::user()->id)->where('team_id', $team_id)->first();
        $team = Team::find($team_id);
        $player = Auth::user()->player;

        if($team_request){
            $team->players()->syncWithoutDetaching([ 
                $player->id => [
                    'position' => $team_request->position,
                    'jersey' => $team_request->jersey,
                ]
            ]);

            $team_request->delete();
            
            //Hire coach
            $player->coaches()->syncWithoutDetaching($team->creator->id);

            return redirect(route('player.teams'));
        }

        return redirect()->back();
    }

    public function teamRequestDecline($team_id)
    {
        $team_request = TeamRequest::where('user_id', Auth::user()->id)->where('team_id', $team_id)->first();
        if($team_request){
            $team_request->delete();
        }

        return redirect()->back();
    }

    public function allSessions()
    {
        return view('player.sessions');
    }

    public function notification()
    {
        return view('player.notification');
    }

    public function playbookRequest()
    {
        $playbooks = Auth::user()->player->player_playbooks;
        return view('player.playbook.request', ['playbooks' => $playbooks]);
    }

    public function playbook($id)
    {
        $playbook = Auth::user()->player->player_playbooks()->where('id', $id)->first();
        if($playbook && $playbook->status == 'submitted')
            return redirect()->back()->with('error', 'Playbook already submitted');
        else if($playbook)
            return view('player.playbook.index', ['id' => $id]);
        else
            abort(404);
    }

    public function playbookModule1($id)
    {
        $playbook = Auth::user()->player->player_playbooks()->where('id', $id)->first();
        if($playbook && $playbook->status == 'submitted')
            return redirect(route('player.dashboard'))->with('error', 'Playbook already submitted');
        else if($playbook)
            return view('player.playbook.module-1', ['id' => $id, 'completeness' => $this->playbookCompleteness($playbook)]);
        else
            abort(404);
    }

    public function playbookModule2($id)
    {
        $playbook = Auth::user()->player->player_playbooks()->where('id', $id)->first();
        if($playbook && $playbook->status == 'submitted')
            return redirect(route('player.dashboard'))->with('error', 'Playbook already submitted');
        else if($playbook){
            if($this->moduleCompleteness(1, $playbook) >= 100)
                return view('player.playbook.module-2', ['id' => $id, 'completeness' => $this->playbookCompleteness($playbook)]);
            else
                return redirect(route('player.playbook.module1', ['id' => $id]))
                    ->with('error', 'You need to complete Module 1 first');
        }
        else
            abort(404);
    }

    public function playbookModule3($id)
    {
        $playbook = Auth::user()->player->player_playbooks()->where('id', $id)->first();
        if($playbook && $playbook->status == 'submitted')
            return redirect(route('player.dashboard'))->with('error', 'Playbook already submitted');
        else if($playbook){
            if($this->moduleCompleteness(2, $playbook) >= 100)
                return view('player.playbook.module-3', ['id' => $id, 'completeness' => $this->playbookCompleteness($playbook)]);
            else if($this->moduleCompleteness(1, $playbook) >= 100)
                return redirect(route('player.playbook.module2', ['id' => $id]))
                    ->with('error', 'You need to complete Module 2 first');
            else
                return redirect(route('player.playbook.module1', ['id' => $id]))
                    ->with('error', 'You need to complete Module 1 first');
        }
        else
            abort(404);
    }

    public function playbookModule4($id)
    {
        $playbook = Auth::user()->player->player_playbooks()->where('id', $id)->first();
        if($playbook && $playbook->status == 'submitted')
            return redirect(route('player.dashboard'))->with('error', 'Playbook already submitted');
        else if($playbook){
            if($this->moduleCompleteness(3, $playbook) >= 100)
                return view('player.playbook.module-4', ['id' => $id, 'completeness' => $this->playbookCompleteness($playbook)]);
            else if($this->moduleCompleteness(2, $playbook) >= 100)
                return redirect(route('player.playbook.module3', ['id' => $id]))
                    ->with('error', 'You need to complete Module 3 first');
            else if($this->moduleCompleteness(1, $playbook) >= 100)
                return redirect(route('player.playbook.module2', ['id' => $id]))
                    ->with('error', 'You need to complete Module 2 first');
            else
                return redirect(route('player.playbook.module1', ['id' => $id]))
                    ->with('error', 'You need to complete Module 1 first');
        }
        else
            abort(404);
    }

    public function playbookModule5($id)
    {
        $playbook = Auth::user()->player->player_playbooks()->where('id', $id)->first();
        if($playbook && $playbook->status == 'submitted')
            return redirect(route('player.dashboard'))->with('error', 'Playbook already submitted');
        else if($playbook){
            if($this->moduleCompleteness(4, $playbook) >= 100)
                return view('player.playbook.module-5', ['id' => $id, 'completeness' => $this->playbookCompleteness($playbook)]);
            else if($this->moduleCompleteness(3, $playbook) >= 100)
                return redirect(route('player.playbook.module4', ['id' => $id]))
                    ->with('error', 'You need to complete Module 4 first');
            else if($this->moduleCompleteness(2, $playbook) >= 100)
                return redirect(route('player.playbook.module3', ['id' => $id]))
                    ->with('error', 'You need to complete Module 3 first');
            else if($this->moduleCompleteness(1, $playbook) >= 100)
                return redirect(route('player.playbook.module2', ['id' => $id]))
                    ->with('error', 'You need to complete Module 2 first');
            else
                return redirect(route('player.playbook.module1', ['id' => $id]))
                    ->with('error', 'You need to complete Module 1 first');
        }
        else
            abort(404);
    }

    private function playbookCompleteness($playbook){
        $module1 = $this->moduleCompleteness(1, $playbook);
        $module2 = $this->moduleCompleteness(2, $playbook);
        $module3 = $this->moduleCompleteness(3, $playbook);
        $module4 = $this->moduleCompleteness(4, $playbook);
        $module5 = $this->moduleCompleteness(5, $playbook);

        $module1_percent = $module1 * 0.2;
        $module2_percent = $module2 * 0.2;
        $module3_percent = $module3 * 0.2;
        $module4_percent = $module4 * 0.2;
        $module5_percent = $module5 * 0.2;

        $total = $module1_percent + $module2_percent + $module3_percent + $module4_percent + $module5_percent;
        
        return intval($total);
    }

    private function moduleCompleteness($module, $playbook){
        $completeness = 0;

        if($module == 1){
            if($playbook->response){
                $response = json_decode($playbook->response, true);

                for($x = 1; $x <= 10; $x++){
                    if(isset($response['module1']['playsheet'.$x]['home']))
                        $completeness += 3;
                    if(isset($response['module1']['playsheet'.$x]['school']))
                        $completeness += 3;
                    if(isset($response['module1']['playsheet'.$x]['activity']))
                        $completeness += 3;
                }

                if(isset($response['module1']['playsheet11']['objective']))
                    $completeness += 2;
                if(isset($response['module1']['playsheet11']['requirement']))
                    $completeness += 2;
                if(isset($response['module1']['playsheet11']['learning']))
                    $completeness += 2;
                if(isset($response['module1']['playsheet11']['work_need']))
                    $completeness += 2;
                if(isset($response['module1']['playsheet11']['date']))
                    $completeness += 2;
            }
        }
        if($module == 2){
            if($playbook->response){
                $response = json_decode($playbook->response, true);

                if(isset($response['module2']['playsheet1']['characteristic']))
                    $completeness += 10;
                if(isset($response['module2']['playsheet1']['expectation']))
                    $completeness += 10;
                if(isset($response['module2']['playsheet2']['draft1']))
                    $completeness += 10;
                if(isset($response['module2']['playsheet2']['draft2']))
                    $completeness += 10;
                if(isset($response['module2']['playsheet3']['draft3']))
                    $completeness += 10;
                if(isset($response['module2']['playsheet3']['vision']))
                    $completeness += 10;
                if(isset($response['module2']['playsheet4']['purpose']))
                    $completeness += 10;
                if(isset($response['module2']['playsheet4']['vision']))
                    $completeness += 10;
                if(isset($response['module2']['playsheet5']['objective']))
                    $completeness += 5;
                if(isset($response['module2']['playsheet5']['requirement']))
                    $completeness += 5;
                if(isset($response['module2']['playsheet5']['learning']))
                    $completeness += 5;
                if(isset($response['module2']['playsheet5']['work_need']))
                    $completeness += 5;
            }
        }

        if($module == 3){
            if($playbook->response){
                $response = json_decode($playbook->response, true);

                if(isset($response['module3']['playsheet1']['home']))
                    $completeness += 13;
                if(isset($response['module3']['playsheet1']['school']))
                    $completeness += 13;
                if(isset($response['module3']['playsheet1']['activity']))
                    $completeness += 13;
                if(isset($response['module3']['playsheet1']['other']))
                    $completeness += 13;
                if(isset($response['module3']['playsheet2']['objective']))
                    $completeness += 12;
                if(isset($response['module3']['playsheet2']['requirement']))
                    $completeness += 12;
                if(isset($response['module3']['playsheet2']['learning']))
                    $completeness += 12;
                if(isset($response['module3']['playsheet2']['work_need']))
                    $completeness += 12;
            }
        }

        if($module == 4){
            if($playbook->response){
                $response = json_decode($playbook->response, true);
                
                for($x=2; $x<=11; $x++){
                    if(isset($response['module4']['playsheet'.$x]['area']) && isset($response['module4']['playsheet'.$x]['date']))
                        $completeness += 1;
                    if(isset($response['module4']['playsheet'.$x]['action1']) && isset($response['module4']['playsheet'.$x]['obstacle1']) && isset($response['module4']['playsheet'.$x]['solution1']))
                        $completeness += 2;
                    if(isset($response['module4']['playsheet'.$x]['action2']) && isset($response['module4']['playsheet'.$x]['obstacle2']) && isset($response['module4']['playsheet'.$x]['solution2']))
                        $completeness += 2;
                    if(isset($response['module4']['playsheet'.$x]['action3']) && isset($response['module4']['playsheet'.$x]['obstacle3']) && isset($response['module4']['playsheet'.$x]['solution3']))
                        $completeness += 2;
                    if(isset($response['module4']['playsheet'.$x]['goal']) && isset($response['module4']['playsheet'.$x]['reward']))
                        $completeness += 1;
                }
    
                if(isset($response['module4']['playsheet12']['objective']))
                    $completeness += 5;
                if(isset($response['module4']['playsheet12']['requirement']))
                    $completeness += 5;
                if(isset($response['module4']['playsheet12']['learning']))
                    $completeness += 5;
                if(isset($response['module4']['playsheet12']['work_need']))
                    $completeness += 5;
            }
        }

        if($module == 5){
            if($playbook->response){
                $response = json_decode($playbook->response, true);

                for($x=3; $x<=14; $x++){
                    if(isset($response['module5']['playsheet'.$x]['area']) && isset($response['module5']['playsheet'.$x]['date']))
                        $completeness += 1;
                    if(isset($response['module5']['playsheet'.$x]['action1']) && isset($response['module5']['playsheet'.$x]['obstacle1']) && isset($response['module5']['playsheet'.$x]['solution1']))
                        $completeness += 2;
                    if(isset($response['module5']['playsheet'.$x]['action2']) && isset($response['module5']['playsheet'.$x]['obstacle2']) && isset($response['module5']['playsheet'.$x]['solution2']))
                        $completeness += 2;
                    if(isset($response['module5']['playsheet'.$x]['action3']) && isset($response['module5']['playsheet'.$x]['obstacle3']) && isset($response['module5']['playsheet'.$x]['solution3']))
                        $completeness += 2;
                    if(isset($response['module5']['playsheet'.$x]['goal']) && isset($response['module5']['playsheet'.$x]['reward']))
                        $completeness += 1;
                }
    
                if(isset($response['module5']['playsheet1']['purpose']))
                    $completeness += 2;
                if(isset($response['module5']['playsheet1']['vision']))
                    $completeness += 2;
            }
        }

        return $completeness;
    }
}
