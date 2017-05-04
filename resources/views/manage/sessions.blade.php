@extends('layouts.overview')

@section('custom_css', '')

@section('content')

    <div class="container">

        <h2>Manage - Sessions</h2>
        <div class="col-md-8">
            <hr />
            <div class="col-md-offset-8">
                <input type="text" class='form-control' id="searchTable" placeholder="Search...">
                <br />
            </div>
            <table id="searchableTable" class="table table-bordered" style="margin:0;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Sessions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($sessions as $session)
                    <tr>
                        <td>{{ $session['user']->name }}</td>
                        <td>{{ $session['user']->email }}</td>
                        <td>{{ count($session['sessions']) }}</td>
                        <td><a href="/manage/sessions/delete.all.{{ $session['user']->id }}">Delete Sessions</a> - <a href="/manage/sessions?user={{ $session['user']->id }}">View Sessions</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Statistics</div>
                <div class="panel-body">
                    <table class="table table-bordered" style="margin:0;">
                        <tbody>
                            <tr>
                                <td>Sessions</td>
                                <td>{{ count(\App\Session::get()) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('modal')

    <div class="modal fade" role="dialog" id="addteacher">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Teacher</h4>
                </div>
                <div class="modal-body">
                    <form id="addTeacher" method="POST" action="/manage/teachers/addteacher">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@inspirationtrust.org.uk">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input id="addTeacherButton" type="submit" value="Add" class="btn btn-primary">
                </div>
            </div>
        </div>
    </div>

    @if ( app('request')->input('user') )
        <div class="modal fade" role="dialog" id="user">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Sessions</h4>
                    </div>
                    <div class="modal-body">
                        @php
                            $modalSessions = \App\Session::where('user_id', app('request')->input('user'))->orderBy('expiration', 'desc')->get();
                        @endphp
                        <table class="table table-bordered" style="margin:0;">
                            <thead>
                                <tr>
                                    <th>Session ID</th>
                                    <th>IP Address</th>
                                    <th>Browser</th>
                                    <th>OS</th>
                                    <th>Expires</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($modalSessions as $session)
                                    <tr>
                                        <td>{{ $session->id }}</td>
                                        <td>{{ $session->ip_address }}</td>
                                        <td>{{ explode('\\', $session->platform)[0] }}</td>
                                        <td>{{ explode('\\', $session->platform)[1] }}</td>
                                        <td>{{ (new Carbon\Carbon($session->expiration))->diffForHumans() }}</td>
                                        <td><a href="/manage/sessions/delete.{{ $session->id }}">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ( app('request')->input('error') )
        <div class="modal fade" role="dialog" id="error">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Error</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{ app('request')->input('error') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@section('javascript')

    <script>

        $(function() { $('#error').modal(); });
        $(function() { $('#user').modal(); });

        $(document).ready(function() {
            $("#addTeacherButton").click(function() {
                $("#addTeacher").submit();
            });
        });

    </script>

@endsection