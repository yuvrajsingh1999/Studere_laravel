@extends('layouts.faculty-navbar')
@php
use App\Models\User; 
@endphp
@section('faculty-content')
<div class="container-fluid bg-dark ml-4 mt-4 p-4 p-md-5 pt-5"  style="width:1250px;">
    <div class="container" style="widht:100%;">
        @if(count((array)$classes) > 0)
        <h2 class="text-white"> Mark Attendence</h2>
            <form class="form-horizontal  " role="form" action="{{action('App\Http\Controllers\FacultyAttenController@store')}}" method="post" enctype="multipart/form-data">
            
            @csrf  
            <div class="form-group text-white w-50 float-left ml-3">
                 
                <div class="col-sm-6">
                    Date:
                    <input type="date" class="form-control" id="date" placeholder=""  name="date" >
                </div>
            </div>
            <div class="col-md-3 w-50 float-right mr-3">
                <div class="form-group text-white">
                    <label for="title">Session</label>
                    <input type="text" class="form-control border border-primary" value="2017/2018" name="session">
                </div>
            </div>
            <input type="hidden" name="dept" value="{{$classes->department}}">
            
            <input type="hidden" name="sem" value="{{$classes->sem}}">
            <input type="hidden" name="facid" value="{{Auth::user()->id}}">
            <div class="col-md-3 ml-auto mr-auto ">
                <div class="form-group text-white">
                    <label for="title">Attendence</label>
                    <select id="atten" name="atten{{Auth::user()->id}}">
                        <option value="present">Present</option>
                        <option value="absent">Absent</option>
                      </select>
                    </div>
            </div>






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