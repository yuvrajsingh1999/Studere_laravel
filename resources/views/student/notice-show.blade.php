@extends('layouts.student-navbar')

@section('student-content')

    
<div class="container-fluid  bg-dark ml-4 mt-4 p-4 p-md-5 pt-5"  style="width:1250px;">

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
                    <td><a href="/notice-download?name={{$dat->notice}}" class="btn btn-primary">Download</a></td>
                </tr>
            @endforeach
        </table>
        @else
            <p class="text-danger">No Data Uploaded</p>
        @endif
</div>
</div>
@endsection