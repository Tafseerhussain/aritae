<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\PlayerController;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/all-players', function () {
    return view('all-players');
})->name('all-players');
Route::get('/all-coaches', function () {
    return view('all-coaches');
})->name('all-coaches');

//Event Routes
Route::get('/all-events', [App\Http\Controllers\EventController::class, 'index'])->name('all-events');
Route::get('/event-detail/{id}', [App\Http\Controllers\EventController::class, 'eventDetail'])->name('event-detail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/call', [App\Http\Controllers\CallController::class, 'index'])->name('call');
Route::get('/video_call', [App\Http\Controllers\CallController::class, 'videoCall'])->name('video_call');
Route::post('/video_call', [App\Http\Controllers\CallController::class, 'videoCall'])->name('video_call_post');
// Endpoints to call or receive calls.
Route::post('/audio/call-user', [App\Http\Controllers\CallController::class, 'callUser']);
Route::post('/audio/accept-call', [App\Http\Controllers\CallController::class, 'acceptCall']);
Route::post('/video/call-user', [App\Http\Controllers\CallController::class, 'videoCallUser']);
Route::post('/video/accept-call', [App\Http\Controllers\CallController::class, 'acceptVideoCall']);

// Route::group(['middleware' => 'player'], function () {
//     Route::get('admin', 'adminController@adminDashboard');
// });


// Route::get('/users', CreateChat::class)->name('users');
// Route::get('/chat{key?}', Main::class)->name('chat');

// COACH MIDDLEWARE
Route::group(['middleware' => 'coach'], function () {
    Route::get('/coach/dashboard', [CoachController::class, 'index'])->name('coach.dashboard');
    Route::get('/coach/profile', [CoachController::class, 'profile'])->name('coach.profile');
    Route::get('/coach/settings', [CoachController::class, 'settings'])->name('coach.settings');
    Route::get('/coach/requests', [CoachController::class, 'requests'])->name('coach.requests');
    Route::get('/coach/requests/{id}', [CoachController::class, 'viewPlayerRequest'])->name('coach.requests.single');
    Route::get('/coach/requests/delete/{id}', [CoachController::class, 'deletePlayerRequest'])->name('coach.requests.single.delete');
    Route::get('/coach/requests/accept/{id}', [CoachController::class, 'acceptPlayerRequest'])->name('coach.requests.single.accept');
    
    // Chat Routes
    Route::get('/coach/chat/users', [CoachController::class, 'chatUsers'])->name('coach.chat.users');
    Route::get('/coach/chat{key?}', [CoachController::class, 'coachChat'])->name('coach.chat');

    // Event Routes
    Route::get('/coach/events', [CoachController::class, 'events'])->name('coach.events');

    // Team Routes
    Route::get('/coach/teams', [CoachController::class, 'teams'])->name('coach.teams');
    Route::get('/coach/team-requests', [CoachController::class, 'teamRequests'])->name('coach.team_requests');
    Route::get('/coach/team-request-accept/{team_id}', [CoachController::class, 'teamRequestAccept'])->name('coach.team_request_accept');
    Route::get('/coach/team-request-decline/{team_id}', [CoachController::class, 'teamRequestDecline'])->name('coach.team_request_decline');

    // Session Routes
    Route::get('/coach/sessions', [CoachController::class, 'allSessions'])->name('coach.all_sessions');

    Route::get('/coach/registration-complete', [CoachController::class, 'registrationComplete'])->name('coach.registrationComplete');
});

// PLAYER MIDDLEWARE
Route::group(['middleware' => 'player'], function () {
    Route::get('/player/dashboard', [PlayerController::class, 'index'])->name('player.dashboard');
    Route::get('/player/profile', [PlayerController::class, 'profile'])->name('player.profile');
    Route::get('/player/settings', [PlayerController::class, 'settings'])->name('player.settings');

    // Chat Routes
    Route::get('/player/chat/users', [PlayerController::class, 'chatPlayers'])->name('player.chat.users');
    Route::get('/player/chat{key?}', [PlayerController::class, 'playerChat'])->name('player.chat');

    // Team Routes
    Route::get('/player/teams', [PlayerController::class, 'teams'])->name('player.teams');
    Route::get('/player/team-requests', [PlayerController::class, 'teamRequests'])->name('player.team_requests');
    Route::get('/player/team-request-accept/{team_id}', [PlayerController::class, 'teamRequestAccept'])->name('player.team_request_accept');
    Route::get('/player/team-request-decline/{team_id}', [PlayerController::class, 'teamRequestDecline'])->name('player.team_request_decline');

    // Session Routes
    Route::get('/player/sessions', [PlayerController::class, 'allSessions'])->name('player.all_sessions');

    //Pyament route
    Route::get('/player/payment', [PlayerController::class, 'payment'])->name('player.payment');

    Route::get('/player/playbook', [PlayerController::class, 'playbook'])->name('player.playbook');
    Route::get('/player/playbook/module-1', [PlayerController::class, 'playbookModule1'])->name('player.playbook.module1');
});

// PARENT MIDDLEWARE
Route::group(['middleware' => 'parent'], function () {
    Route::get('/parent/dashboard', [ParentController::class, 'index'])->name('parent.dashboard');
    Route::get('/parent/profile', [ParentController::class, 'profile'])->name('parent.profile');
    Route::get('/parent/settings', [ParentController::class, 'settings'])->name('parent.settings');
    Route::get('/parent/player', [ParentController::class, 'player'])->name('parent.player');

    // Chat Routes
    Route::get('/parent/chat{key?}', [ParentController::class, 'parentChat'])->name('parent.chat');
});

// ADMIN MIDDLEWARE
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::get('/admin/sports', [AdminController::class, 'sports'])->name('admin.sports');

    // Event Routes
    Route::get('/admin/events', [AdminController::class, 'events'])->name('admin.events');

    // Team Routes
    Route::get('/admin/teams', [AdminController::class, 'teams'])->name('admin.teams');

    // Users Routes
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');

    // Calendar Routes
    Route::get('/admin/calendar', [AdminController::class, 'calendar'])->name('admin.calendar');

    // Contact Routes
    Route::get('/admin/contact', [AdminController::class, 'contact'])->name('admin.contact');

    // Notification Routes
    Route::get('/admin/notification', [AdminController::class, 'notification'])->name('admin.notification');

    // Blog Routes
    Route::get('/admin/blog', [AdminController::class, 'blog'])->name('admin.blog');
});

Route::get('/coach/profile/{id}', [CoachController::class, 'profilePreview'])->name('coach.profile.preview');
Route::get('/player/profile/{id}', [PlayerController::class, 'profilePreview'])->name('player.profile.preview');

Route::get('test', function() {
    $users = \App\Models\Coach::find([1, 2, 3]); 
    $sport = \App\Models\Sport::find(1);
    $sport->users()->attach($users);
});