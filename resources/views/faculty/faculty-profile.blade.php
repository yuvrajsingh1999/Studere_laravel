@extends('layouts.faculty-navbar')

@section('faculty-content')

<div class="container-fluid p-4 p-md-5 pt-5" style="width:1250px;">
@if(count($users) > 0 )
<div class="container">
    @if(Session::has('message'))
  <div class="alert alert-success">
  <p >{{ Session::get('message') }}</p>
  </div>
    @endif
      <div class="row">
  
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3" >
  
  
          <div class="panel panel-default">
              @foreach ($users as $user)
            <div class="panel-heading">
              <h3 class="panel-title"> Profile </h3>
            </div>
            <div class="panel-body" style="height:550px;">
              <div class="row" style="margin-right:0px;margin-bottom:0px;">
                <div class="col-md-3 col-lg-3 " align="left">
                  <img alt="User Pic" src="/profile_image/{{ $user->profile_pic}}" class="img-circle img-responsive" style="
                  border-radius: 50%;height:100px;width:120px;">
                </div>
  
                <div class=" col-md-9 col-lg-9 ml-3 float-right" >
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name</td>
                        <td><strong>{{Auth::user()->name}}</strong></td>
                      </tr>
                      <tr>
                        <td>Class</td>
                        <td>{{ $user->class }}</td>
                      </tr>
                      <tr>
                        <td>Semester</td>
                        <td>{{ $user->sem }}</td>
                      </tr>
                      <tr>
                        <td>Department</td>
                        <td>{{ $user->department }}</td>
                      </tr>
                      <tr>
                        <td>Address</td>
                        <td>{{ $user->address }} </td>
                      </tr>
                        <tr>
                          <td>Date of Birth</td>
                          <td>{{ $user->dob }}</td>
                        </tr>
                        <tr>
                          <td>Gender</td>
                          <td>{{ $user->gender }}</td>
                        </tr>
                        <tr>
                          <td>Mobile</td>
                          <td>{{ $user->phone }}</td>
                        </tr>
  
                      </tr>
  
                    </tbody>
                  </table>
  
  
                </div>
              </div>
            </div>
                  
                 <div class="panel-footer">
                        <span class="float-right">
                            <a href="/editprofile" type="button" class="btn btn-primary fas fa-edit"> Edit Profile</a>
                             </span>
                  </div>
                @endforeach
          </div>
          
        </div>
      </div>
  </div>
@else
        <div class="container">
            <a href="/enterprofile"><button class="btn btn-primary">Enter Profile</button></a>
        </div>
@endif
</div>
    
@endsection