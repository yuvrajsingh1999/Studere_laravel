@extends('layouts.faculty-navbar')

@section('faculty-content')

<div class="container p-4 p-md-5 pt-5" style="width:1100px;">
    <div class="row justify-content-center">

    <h2 class="mb-4"><center></center></h2>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Welcome {{Auth::user()->role}}</h1><br>
                    {{ __('You are logged in!') }}
                    <strong>Hello {{Auth::user()->name}}</strong>
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection