@extends('layouts.student-navbar')

@section('student-content')

<iframe src="/storage/assets/{{$data->file_name}}"></iframe>
    
@endsection