@extends('layouts.faculty-navbar')

@section('faculty-content')

<div class="container bg-dark text-center mt-4 ml-3 p-4 p-md-5 pt-5">
    <h2 class="text-white"> Enter Profile</h2>
    <form class="form-horizontal  " role="form" action="{{action('App\Http\Controllers\FacultyController@store')}}" method="post" enctype="multipart/form-data">
    
      @csrf  
     <h3 class="text-white">{{Auth::user()->name}}</h3><br>
        
      <div class="form-group text-white w-50 float-left">
        class 
        <div class="col-sm-6">
          <input type="text" class="form-control" id="class" placeholder=""  name="class" style="margin-left:130px;">
        </div>
      </div>

      <div class="form-group w-50 text-white float-right">
        Semester 
        <div class="col-sm-6">
          <input type="number" class="form-control" id="sem" placeholder=""  name="sem" style="margin-left:130px;">
        </div>
      
      </div>

      <div class="form-group w-50 text-white float-left">
        Department
        <div class="col-sm-6">
          <input type="text" class="form-control" id="department" placeholder=""  name="department" style="margin-left:130px;">
        </div>
      </div>
      <div class="form-group w-50 text-white float-right">
        Mobile 
        <div class="col-sm-6">
          <input type="number" class="form-control" id="phone" placeholder=""  name="phone" style="margin-left:130px;">
        </div>
      </div>
    
      <div class=" form-group text-white w-50 ">
      Date of Birth:
      <div class="col-sm-6 pt-1">
      <input type="date" id="birthday" name="dob"  style="margin-left:170px;">
      </div>
      </div>  
    
      <div class="form-group text-white w-50 mt-2" style="margin-left:250px;">
        <p style="margin-right:180px;">Address</p>
        <input type="text" class="form-control" id="inputAddress" placeholder=""  name="address" >
      </div>
    
      <div class="w-50 text-white" style="margin-left:250px;">
        Gender:
      
      <select class="custom-select" name="gender"  id="gender" >
        <option selected>Choose...</option>
        <option name="gender" value="male">Male</option>
        <option name="gender" value="female">Female</option>
      </select>
    </div>
    
    <div class="mt-3 mb-3 text-white">
    Select an image:
      <input type="file" class="fas fa-file-import btn btn-light" id="profile_pic"  name="profile_pic">
    </div>
    
      <div class="form-group">
        <div class=" col-sm-5 ml-auto mr-auto">
          <button type="submit"  class="btn btn-primary" name="submit">Submit</button>
        </div>
      </div>
    
    
    </form>
    
    </div>
    
    
    
@endsection