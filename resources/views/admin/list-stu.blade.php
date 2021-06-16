@extends('layouts.admin-navbar')

@section('admin-content')
<div  class="container-fluid p-4 p-md-5 pt-5" style="width:1200px;">
    <h2 class="mb-4"><center>Students Registered</center></h2>
<table class='table'>
    @if(count($students) > 0)
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
      <th>Status</th>
      <th>Delete</th>
      <th>Activate/Deactivate</th>
    </tr>
    @foreach ($students as $stud)
    <tbody>
        <tr>
            
           <td>{{$stud->id}}</td>
           <td>{{$stud->name}}</td>
          
           <td>{{$stud->email}}</td>
           <td>{{$stud->role}}</td>
           @if($stud->status == 1)
           <td>Activated</td>
           @else 
           <td>Deactivated</td>
           @endif
            
           <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" id="submit" data-whatever="{{$stud->id}}">
            Delete
            
          </button></td>
          <td>
            <a href="/activate/{{$stud->id}}" ><button type="button" class="btn btn-primary mr-2">Activate</button></a>
            <a href="/deactivate/{{$stud->id}}" ><button type="button" class="btn btn-danger">Deactivate</button></a>
        
        </td> 
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
            Are you sure you want to delete user: {{$stud->id}}
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
{{-- <script>
    $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var recipient = button.data('whatever'); // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    dd(recipient);
    // modal.find('.modal-body').text('Are you sure you want to delete user: ' + recipient)
    modal.find('.modal-body input').val(recipient);
  })
    </script> --}}
@endsection