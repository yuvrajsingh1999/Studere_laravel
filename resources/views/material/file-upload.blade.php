@extends('layouts.faculty-navbar')

@section('faculty-content')
<div class="container-fluid  bg-dark ml-4 mt-4 p-4 p-md-5 pt-5"  style="width:1250px;">
<div class="container mt-5">
    <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
      <h3 class="text-center text-white mb-5">Upload File in Laravel</h3>
        @csrf
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
      @endif

      @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
        <input type="hidden" name="course" value="{{$course}}">
        <input type="hidden" name="sem" value="{{$sem}}">
        <input type="hidden" name="deptcode" value="{{$deptcode}}">
        <div class="custom-file">
            <input type="file" name="file" class="custom-file-input" id="chooseFile">
            <label class="custom-file-label" for="chooseFile">Select file</label>
        </div>

        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
            Upload Files
        </button>
    </form>
</div>
</div>
    
@endsection