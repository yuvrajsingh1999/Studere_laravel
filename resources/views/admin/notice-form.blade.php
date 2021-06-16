@extends('layouts.admin-navbar')

@section('admin-content')

<div class="container-fluid  bg-dark ml-4 mt-4 p-4 p-md-5 pt-5"  style="width:1250px;">
    <!-- Button trigger modal -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
      @endif

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    New Notice
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Notice Upload</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
    <form action="{{route('noticeUpload')}}" method="post" enctype="multipart/form-data">
       
          @csrf
          <div class="custom-file">
              <input type="file" name="file" class="custom-file-input" id="chooseFile">
              <label class="custom-file-label" for="chooseFile">Select file</label>
          </div>
  
      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          <button type="submit" name="submit" class="btn btn-primary btn-block">
            Upload 
        </button>
        </div>
    </form>
    </div>
    </div>
  </div>
    <div class="container mt-5">
        @if(count($data) > 0 )
        <table class="table table-responsive table-striped text-white">
            <tr>
                <th>S.no</th>
                <th>Notices</th>
                <th class="text-center">Posted At</th>
                
                <th>Read</th>
                <th>Download</th>
            </tr>
            @foreach($data as $dat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="#">{{ $dat->notice }}</a></td>
                    <td class="text-center"><code>{{$dat->created_at}}</code></td>
                    
                    <td class="text-center"><code><a href="{{url('/viewnotice',$dat->id)}}" class="btn btn-success">Read</a></code></td>
                    <td><a href="/file-download?name={{$dat->file_name}}" class="btn btn-primary">Download</a></td>
                </tr>
            @endforeach
        </table>
        @else
            <p class="text-danger">No Data Uploaded</p>
        @endif
</div>
</div>
    
    
@endsection