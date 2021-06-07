@extends('layouts.admin-navbar')

@section('admin-content')
<div  class="container-fluid p-4 p-md-5 pt-5" style="width:1200px;">
    <h2 class="mb-4"><center>Faculty Waiting</center></h2>
<table class='table'>
    @if(count($faculties) > 0)
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
      <th>Status</th>
      <th>Delete</th>
      <th>Accept</th>
    </tr>
    @foreach ($faculties as $fac)
    <tbody>
        <tr>
            
           <td>{{$fac->id}}</td>
           <td>{{$fac->name}}</td>
          
           <td>{{$fac->email}}</td>
           <td>{{$fac->role}}</td>
           @if($fac->status == 0)
           <td>Waiting</td>
           @else 
           <td>Accepted</td>
           @endif
            
           <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" id="submit" >
            Delete
            
          </button></td>
          <td>
            <a href="/accept/{{$fac->id}}" ><button type="button" class="btn btn-primary">Accept</button></a></td> 
        </tr>

    </tbody>
    @endforeach
    @endif
</table>
</div>

@endsection