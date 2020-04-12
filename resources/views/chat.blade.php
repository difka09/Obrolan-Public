@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Obrolan Publik</h3>
                    </div>

                    <div class="card-body" id="card-body">
                        <dw-messages :messages="messages"></dw-messages>
                    </div>
                    <div class="card-footer">
                        <dw-form
                            v-on:sent="addMessage" v-bind:user="{{ Auth::user() }}">
                        </dw-form>
                        <span v-show="typing" class="help-block" style="font-style: italic;">
                            @{{ user }} is typing...
                         </span>
                    </div>
                    {{-- <form action="/messages" method="POST">
                        @csrf
                        <input type="text" name="message">
                        <button class="btn btn-sm" type="submit">xx</button>
                    </form> --}}
                </div>
            </div>
            <div class=" col-md-4">
                <div class="card">
                <div class="card-header">
                    <h3>Aktif User</h3>
                </div>
                <div class="card-body">
                <dw-activeuser :me='@json(auth()->user()->toArray())'></dw-activeuser>
                </div>
                </div>
            </div>

        </div>
    </div>
@endsection

