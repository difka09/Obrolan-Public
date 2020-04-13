<?php

use Illuminate\Support\Facades\Auth;
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

Broadcast::channel('chat', function($user){
    return Auth::check();
});

Broadcast::channel('online', function ($user) {
    if (auth()->check()) {
        return $user->toArray();
    }
});

Broadcast::channel('chat.{user_id}.{friend_id}', function($user, $user_id, $friend_id){
    return $user->id == $friend_id;
});
// Broadcast::channel('chat.'', ::class);
// Broadcast::channel('App.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });
