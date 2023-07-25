<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{receiver}', function(User $user, $receiver) {
    return (int) $user->id === (int) $receiver;
});

Broadcast::channel('coach-connect.{receiver}', function(User $user, $receiver) {
    return (int) $user->id === (int) $receiver;
});

Broadcast::channel('admin-notification.{receiver}', function(User $user, $receiver) {
    return (int) $user->id === (int) $receiver;
});

Broadcast::channel('playbook-request.{receiver}', function(User $user, $receiver) {
    return (int) $user->id === (int) $receiver;
});

Broadcast::channel('presence-call-channel', function($user) {
    return ['id' => $user->id, 'name' => $user->name];
});

Broadcast::channel('presence-video-channel', function($user) {
    return ['id' => $user->id, 'name' => $user->name];
});