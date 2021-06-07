@extends('layouts.admin-navbar')

@section('admin-content')
    <div class="container-fluid bg-dark ml-4 mt-4 p-4 p-md-5 pt-5" style="width:1250px;">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-white" style="overflow: hidden;">Venues
                        <button class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal2" style="margin-right: 5px;">
                            <i class="glyphicon glyphicon-plus"></i> New
                        </button>&nbsp;
                    </div>

                    <div class="panel-body mt-2">
                        @if(count($venues) > 0)
                            <table class="table table-striped text-white">
                                <tr>
                                    <th>S.No</th>
                                    <th>Hall Name</th>
                                    <th>Status</th>
                                </tr>

                                @foreach($venues as $venue)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $venue->name }}</td>
                                        <td>
                                            @if($venue->is_in_use)
                                                <span class="label label-danger">taken</span>
                                            @else
                                                <span class="label label-success">free</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <form action="{{ route('venue.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">New Venue</h4>
                        
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label for="title">Hall Name</label>
                                        <input type="text" class="form-control border border-primary" name="name">
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