@extends('layouts.app')

@section('content')
 
<div class="container bg-dark text-white ml-4 mt-4 p-4 p-md-5 pt-5 " style="width:1250px;">

    <!-- Alert User -->
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
        <h2 class="text-white">Contact Form</h2>
    <form  method="post" action="{{ route('contact.save') }}">
        @csrf

        <div class="form-group w-50">
            <label>Name</label>
            <input type="text" class="form-control" name="name" id="name">

            <!-- Show error -->
            @if ($errors->has('name'))
                <div class="alert alert-danger">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>

        <div class="form-group w-50">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="email">

            <!-- Show error -->
            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif                
        </div>

        <div class="form-group w-50">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone" id="phone">

            <!-- Show error -->
            @if ($errors->has('phone'))
                <div class="alert alert-danger">
                    {{ $errors->first('phone') }}
                </div>
            @endif                                
        </div>

        <div class="form-group w-50">
            <label>Subject</label>
            <input type="text" class="form-control" name="subject" id="subject">

            <!-- Show error -->
            @if ($errors->has('subject'))
                <div class="alert alert-danger">
                    {{ $errors->first('subject') }}
                </div>
            @endif                 
        </div>

        <div class="form-group w-50">
            <label>Message</label>
            <textarea class="form-control" name="message" id="message" rows="5"></textarea>

            <!-- Show error -->
            @if ($errors->has('message'))
                <div class="alert alert-danger">
                    {{ $errors->first('message') }}
                </div>
            @endif                    
        </div>

        <input type="submit" name="send" value="Send" class="btn btn-primary btn-block w-50">
    </form>
</div>
    
@endsection
