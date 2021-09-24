
@extends('layouts.faculty-navbar')

@section('faculty-content')

<div class="container bg-dark ml-4 mt-4 p-4 p-md-5 pt-5"  style="width:1250px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading ">Chats</div>

                <div class="panel-body bg-light">
                    <chat-messages :messages="messages"></chat-messages>
                </div>
                <div class="panel-footer">
                    <chat-form
                        v-on:messagesent="addMessage"
                        :user="{{ Auth::user() }}"
                    ></chat-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection