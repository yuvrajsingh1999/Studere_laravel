@extends('layouts.admin-navbar')

@section('admin-content')
    <div class="container-fluid bg-dark ml-4 mt-4 p-4 p-md-5 pt-5"  style="width:1250px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-white" style="overflow: hidden;">Courses
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">
                            <i class="glyphicon glyphicon-plus text-white"></i> New
                        </button>&nbsp;

                        @if(count($courses) > 0)
                            <a href="/generate?dept={{ request('dept') }}&level={{ request('level') }}&semester={{ request('sem') }}&session={{ request('sess') }}"
                               class="btn btn-success text-white float-right" style="margin-right:5px;">
                                <i class="glyphicon glyphicon-tasks"></i> Generate Time Table
                            </a>
                            <a href="/time-table?dept={{ request('dept') }}&level={{ request('level') }}&semester={{ request('sem') }}&session={{ request('sess') }}"
                               class="btn btn-info text-white float-right" style="margin-right:5px;">
                                <i class="glyphicon glyphicon-eye-open"></i> View TimeTable
                            </a>
                        @endif
                    </div>

                    <div class="panel-body">
                        <form action="{{ route('courses') }}" >
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group text-white">
                                        <label for="department">Department</label>
                                        <select name="dept" id="department" class="form-control">
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}" {{ request('dept') == $department->id? 'SELECTED' : '' }}>{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group text-white">
                                        <label for="level">Level</label>
                                        <select name="level" id="level" class="form-control">
                                            @for($x = 100; $x <= 700; $x += 100)
                                                <option value="{{ $x }}" {{ request('level') == $x ? 'SELECTED' : '' }}>{{ $x }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                              
                                <div class="col-md-2">
                                    <div class="form-group text-white">
                                        <label for="semester">Semester</label>
                                        <select name="sem" id="semester" class="form-control">
                                            <option value="1" {{ request('sem') == 1 ? 'SELECTED' : '' }}>1st</option>
                                            <option value="2" {{ request('sem') == 2 ? 'SELECTED' : '' }}>2nd</option>
                                            <option value="3" {{ request('sem') == 3 ? 'SELECTED' : '' }}>3rd</option>
                                            <option value="4" {{ request('sem') == 4 ? 'SELECTED' : '' }}>4th</option>
                                            <option value="5" {{ request('sem') == 5 ? 'SELECTED' : '' }}>5th</option>
                                            <option value="6" {{ request('sem') == 6 ? 'SELECTED' : '' }}>6th</option>
                                            <option value="7" {{ request('sem') == 7 ? 'SELECTED' : '' }}>7th</option>
                                            <option value="8" {{ request('sem') == 8 ? 'SELECTED' : '' }}>8th</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group text-white">
                                        <label for="semester">Session</label>
                                        <input type="text" name="sess" class="form-control" value="2017/2018">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <br>
                                        <button class="btn btn-success">Apply!</button>
                                    </div>
                                </div>

                            </div>
                        </form>

                        <hr>

                        @if(count($courses) > 0)
                            <table class="table table-responsive table-striped text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Course Title</th>
                                    <th class="text-center">Course Code</th>
                                    <th class="text-center">Units</th>
                                    <th>Lecture Time</th>
                                    <th>Lecturer</th>
                                </tr>
                                @foreach($courses as $course)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="#">{{ strtoupper($course->title) }}</a></td>
                                        <td class="text-center"><code>{{ $course->code }}</code></td>
                                        <td class="text-center">{{ $course->units }}</td>
                                        <td class="text-center"><code>{{ $course->units }}hrs</code></td>
                                        <td>{{ 'NIL' }}</td>
                                    </tr>
                                @endforeach
                            </table>

                        @else
                            <p class="text-center text-danger">No courses available</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <form action="{{ route('course.store') }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">New Course</h4>
                        
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Course Title</label>
                                        <input type="text" class="form-control border border-primary" name="title">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="title">Course Code</label>
                                        <input type="text" class="form-control border border-primary" name="code">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="title">Units</label>
                                        <input type="number" class="form-control border border-primary" min="0" name="units">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="title">Department</label>
                                        <select name="dept" id="department" class="form-control border border-primary">
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="title">Level</label>
                                        <select name="level" id="level" class="form-control border border-primary">
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                            <option value="300">300</option>
                                            <option value="400">400</option>
                                            <option value="500">500</option>
                                            <option value="600">600</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="title">Semester</label>
                                        <select name="semester" id="semester" class="form-control border border-primary">
                                            <option value="1">1st</option>
                                            <option value="2">2nd</option>
                                            <option value="3">3rd</option>
                                            <option value="4">4th</option>
                                            <option value="5">5th</option>
                                            <option value="6">6th</option>
                                            <option value="7">7th</option>
                                            <option value="8">8th</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="title">Session</label>
                                        <input type="text" class="form-control border border-primary" value="2017/2018" name="session">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection