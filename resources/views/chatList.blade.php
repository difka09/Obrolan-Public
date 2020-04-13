@extends('layouts.app')

@section('content')
    <audio id="chat-audio">
        <source src="{{asset('sounds/ping.mp3')}}"  allow="autoplay">
    </audio>
    <meta name="friendId" content="{{$friend->id}}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Mengobrol dengan {{ucwords($friend->name)}}</h3>
                    </div>

                    <div class="card-body">
                        <dw-messages-friend v-bind:chats="chats" v-bind:user_id="{{auth()->user()->id}}" v-bind:friend_id="{{$friend->id}}"></dw-messages>
                    </div>
                    <div class="card-footer">
                        <dw-form-friend v-bind:user_id="{{auth()->user()->id}}" v-bind:chats="chats" v-bind:friend_id="{{$friend->id}}"></dw-form-friend>
                        {{-- <span v-show="typing" class="help-block" style="font-style: italic;"> --}}
                            {{-- @{{ user }} is typing... --}}
                         {{-- </span> --}}
                    </div>
                </div>
            </div>
            <div class=" col-md-4">
                <div class="card">
                <div class="card-header">
                    <h3>Aktif User</h3>
                </div>
                <div class="card-body">
                {{-- <dw-activeuser :me='@json(auth()->user()->toArray())'></dw-activeuser> --}}
                </div>
                </div>
            </div>

        </div>
    </div>
@endsection

