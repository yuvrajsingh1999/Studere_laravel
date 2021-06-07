@extends('layouts.student-navbar')

@section('student-content')


<div class="container-fluid  bg-dark ml-4 mt-4 p-4 p-md-5 pt-5"  style="width:1250px;">
    <div class="row justify-content-center">
        @foreach($courses as $course)
        <div class="col-md-4 mt-2">
            
            <div class="card">
                <div class="card-header"><a href="/download?class={{$profiles['class']}}&code={{$course->code}}&sem={{$course->semester}}&deptcode={{$course->dept}}">{{$course->title }}</a></div>

                <div class="card-body">

                    {{$course->code}}
                    
                </div>
            <div class="card-footer">
                <small>{{$profiles['department']}}</small>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
    
    
@endsection