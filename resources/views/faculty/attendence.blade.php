@extends('layouts.faculty-navbar')

@section('faculty-content')

<div class="container-fluid bg-dark ml-4 mt-4 p-4 p-md-5 pt-5"  style="width:1250px;">
    @if(Session::has('message'))
    <div class="alert alert-success">
    <p >{{ Session::get('message') }}</p>
    </div>
      @endif
<a href="/facmarkatt" class="btn btn-primary">Self Attendence</a>
<a href="/stumarkatt" class="btn btn-primary">Student Attendence</a>

<div id='calendar' class="mt-3 text-white" style="color:white;"></div>


</div>
    
<link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.css' rel='stylesheet' />
<link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/moment.min.js'></script>
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/jquery.min.js'></script>
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js'></script>

<script>
jQuery(document).ready(function($) {
$('#calendar').fullCalendar({
  header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,basicWeek,basicDay'
  },
  navLinks: true, // can click day/week names to navigate views
  editable: true,
  eventLimit: true, // allow "more" link when too many events
  events : [
                @foreach($attendences as $atten)
                {
                    title : '{{ $atten->attendence}}',
                    start : '{{ $atten->date }}',
                    
                },
                @endforeach
            ],
 
});
});
</script>
@endsection