<?php

namespace App\Http\Controllers;

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
