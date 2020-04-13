<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Events\MessageSent;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }

    public function friendList()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('friendList', ['users' => $users    ]);
    }

    public function showChat($friendId)
    {
        $friend = User::find($friendId);
        return view('chatList', ['friend' => $friend]);

    }

    public function getMessageFriend($friendId)
    {
        $messages = Chat::where(function($query) use ($friendId){
            $query->where('user_id', '=', auth()->user()->id)->where('friend_id','=',$friendId);
        })->orWhere(function($query) use ($friendId){
            $query->where('user_id', '=', $friendId)->where('friend_id', '=', auth()->user()->id);
        })->with('user')->get();
        return $messages;
    }

    public function broadcastMessageFriend(Request $request)
    {
        $message = Chat::create([
            'user_id'   => $request->user_id,
            'friend_id' => $request->friend_id,
            'message'   => $request->message
        ]);

        // broadcast(new BroadcastChat($message));
        return true;

    }

    public function getMessage()
    {
        return Message::with('user')->get();
    }

    public function broadcastMessage(Request $request)
    {
        $user = Auth::user();
        // $user = auth()->user();
        $message = $user->messages()->create([
            'message' => $request->message
        ]);

        $cek = broadcast(new MessageSent($user, $message))->toOthers();

        return response()->json(['status' => 'Message Sent!', 'data' => $cek]);
    }
}
