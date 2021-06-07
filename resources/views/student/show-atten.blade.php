@extends('layouts.student-navbar')

@section('student-content')

<div class="container-fluid bg-dark ml-4 mt-4 p-4 p-md-5 pt-5"  style="width:1250px;">
    <div class="container "> 
        <form class="form-horizontal" role="form" action="{{action('App\Http\Controllers\AttendenceController@show')}}" method="post">
           @csrf 
            <input type="hidden" name="dept" value="{{$students['department']}}">
            <input type="hidden" name="sem" value="{{$students['sem']}}">
            <div class="form-group w-50 float-left  text-white">
                <div class="col-md-3" style="">
                
                    <label for="title">Session</label>
                    <input type="text" class="form-control border border-primary" value="2017/2018" name="session">
                </div>
            </div>
            <div class="form-group w-50 mt-4 float-right">
                <div class=" col-sm-5  ">
                <button type="submit"  class="btn btn-primary" name="submit">Apply</button>
                </div>
            </div>
            
        </form>
    </div>
    @if(count($attendence) > 0)
    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#myatten">
        <i class="glyphicon glyphicon-plus text-white"></i> Show Detail
    </button>&nbsp;


    <div class="modal fade" id="myatten" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Attendence for session:{{$session}}</h4>
                
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>


                <div class="modal-body">
        <table class="table table-responsive table-striped text-dark">
            <tr>
                <th>S.no</th>
                <th>Roll no</th>
                <th class="text-center">Date</th>
                <th class="text-center">Lecture</th>
                <th>Attendence</th>
                <th>Session</th>
            </tr>
            @foreach($attendence as $atten)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="#">{{$atten->roll_no}}</a></td>
                    <td class="text-center"><code>{{$atten->date }}</code></td>
                    <td class="text-center">{{ $atten->lecture_code }}</td>
                    <td class="text-center"><code>{{ $atten->attendence }}</code></td>
                    <td>{{ $atten->session }}</td>
                </tr>
            @endforeach
        </table>
                </div>
            </div>
        </div>
    </div>
        <div class="container mt-2 text-white"> 
            <h5 class="text-white">Total Days Marked: {{$totalday}}</h5>
            <h5 class="text-white">Total Days Present: {{$cnt_prsnt}}</h5>
            <h5 class="text-white">Total Days Absent: {{$cnt_absnt}}</h5>
            <h5 class="text-white">Percentage Attendence(%): {{($cnt_prsnt/$totalday)*100}}</h5>
        </div>
    @else
                            <p class="text-center text-danger">Select Session First</p>

    @endif

</div>
    
@endsection