@extends('layouts.student-navbar')

@section('student-content')

<div class="container-fluid  bg-dark ml-4 mt-4 p-4 p-md-5 pt-5"  style="width:1250px;">
    @if(count($materials) > 0 )
    <table class="table table-responsive table-striped text-white">
        <tr>
            <th>S.no</th>
            <th>File Name</th>
            <th class="text-center">Posted At</th>
            
            <th>Read</th>
            <th>Download</th>
        </tr>
        @foreach($materials as $mat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="#">{{ $mat->file_name }}</a></td>
                <td class="text-center"><code>{{$mat->created_at}}</code></td>
                
                <td class="text-center"><code><a href="{{url('/viewfile',$mat->id)}}" class="btn btn-success">Read</a></code></td>
                <td><a href="/file-download?name={{$mat->file_name}}" class="btn btn-primary">Download</a></td>
            </tr>
        @endforeach
    </table>
    @else
        <p class="text-danger">No Data Uploaded</p>
    @endif

</div>
    
@endsection