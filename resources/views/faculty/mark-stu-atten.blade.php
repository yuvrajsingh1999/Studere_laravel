@extends('layouts.faculty-navbar')
@php
use App\Models\User; 
@endphp
@section('faculty-content')
<div class="container-fluid bg-dark ml-4 mt-4 p-4 p-md-5 pt-5"  style="width:1250px;">
    <div class="container" style="widht:100%;">
        @if(count($students) > 0)
        <h2 class="text-white"> Mark Attendence</h2>
            <form class="form-horizontal  " role="form" action="{{action('App\Http\Controllers\AttendenceController@store')}}" method="post" enctype="multipart/form-data">
            
            @csrf  
            <div class="form-group text-white w-50 float-left">
                Date: 
                <div class="col-sm-6">
                <input type="date" class="form-control" id="date" placeholder=""  name="date" >
                </div>
            </div>
            <div class="col-md-3 w-50 float-right">
                <div class="form-group text-white">
                    <label for="title">Session</label>
                    <input type="text" class="form-control border border-primary" value="2017/2018" name="session">
                </div>
            </div>
            <div class="form-group text-white w-50 float-left">
                Lecture: 
                <div class="col-sm-6">
                    <select id="lec" name="lec">

             @foreach($courses as $course)
                    <option value="{{$course->code}}">{{$course->title}}</option>
                    
            @endforeach
                  </select>
                </div>
            </div>

            <table class="table text-white">
                <tr>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>

            @foreach($students as $stu)
                @php
                    $name = User::where('id',$stu->user_id)->pluck('name');

                @endphp


            <input type="hidden" name="dept" value="{{$stu->department}}">

            <input type="hidden" name="sem" value="{{$stu->sem}}">
                <tr>
                    <td><input type="hidden" class="form-group" name="stu{{$stu->roll_no}}" value="{{$stu->roll_no}}">{{$stu->roll_no}}</td>
                    <td>{{$name[0]}}</td>
                
                    <td><select id="atten" name="atten{{$stu->roll_no}}">
                        <option value="present">Present</option>
                        <option value="absent">Absent</option>
                      </select></td>
                </tr>

            @endforeach
            </table>


            <div class="form-group">
                <div class=" col-sm-5 ml-auto mr-auto">
                <button type="submit"  class="btn btn-primary" name="submit">Submit</button>
                </div>
            </div>
            
            
            </form>
            @endif
    </div>




</div>
    
@endsection