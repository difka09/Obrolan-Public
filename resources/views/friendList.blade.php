@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Friends</h3>
                    </div>

                    <div class="card-body" id="card-body">
                        <ul class="chat">
                            @foreach ($users as $user)
                            <li class="left clearfix">
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <a href="{{Route('show.chat', $user->id)}}" class="primary-font">
                                            {{$user->name}}
                                        </strong>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

