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
            
           <td>{{$loop->iteration}}</td>
           <td>{{$fac->name}}</td>
          
           <td>{{$fac->email}}</td>
           <td>{{$fac->role}}</td>
           @if($fac->status == 0)
           <td>Waiting</td>
           @else 
           <td>Accepted</td>
           @endif
            
           <td><a href="/delete_buffer/{{$fac->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">Delete</a></td>
        
          <td>
            <a href="/accept/{{$fac->id}}" ><button type="button" class="btn btn-primary">Accept</button></a></td> 
        </tr>

    </tbody>

     <!-- Modal -->
     <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          Are you sure you want to delete user: {{$fac->id}}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-primary">Yes</button>
          </div>
        </div>
      </div>
    </div>
     
    @endforeach
    @endif
</table>
</div>
<script>
  $('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body').text('Are you sure you want to delete user: ' + recipient)
  // modal.find('.modal-body input').val(recipient)
})
  </script>

@endsection