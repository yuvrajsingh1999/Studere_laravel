@extends('layouts.admin-navbar')


@section('admin-content')
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
<div class="container  bg-dark ml-4 mt-4 p-4 p-md-5 pt-5"  style="width:1250px;">
    <form action="/send-mail" method="post">
        @csrf
          
      <div class="form-group text-white w-50 float-left">
        To: 
        <div class="col-sm-6">
          <input type="email" class="form-control" id="to" placeholder=""  name="to" style="margin-left:130px;">
        </div>
      </div>
      <div class="form-group text-white w-50 float-left">
        Title 
        <div class="col-sm-6">
          <input type="text" class="form-control" id="title" placeholder=""  name="title" style="margin-left:130px;">
        </div>
      </div>
  
      <div class="form-group text-white ">
        Message 
        <div class="col-sm-6">
          <textarea  class="form-control" id="body" placeholder=""  name="body" style="margin-left:130px;"></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class=" col-sm-5 ml-auto mr-auto">
          <button type="submit"  class="btn btn-primary" name="submit">Submit</button>
        </div>
      </div>
    
    </form>
</div>
    
@endsection