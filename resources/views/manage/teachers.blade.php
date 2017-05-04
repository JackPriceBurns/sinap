@extends('layouts.overview')

@section('custom_css', '')

@section('content')

    <div class="container">

        <h2>Manage - Teachers</h2>
        <div class="col-md-8">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addteacher">Add Teacher</button>
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
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td><a href="/manage/teachers/delete.{{ $teacher->id }}">Delete</a></td>
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
                            <td>Teachers</td>
                            <td>{{ count($teachers) }}</td>
                        </tr>
                        <tr>
                            <td>Most Missing Homework</td>
                            <td>Graham Colman</td>
                        </tr>
                        <tr>
                            <td>Most Completed Homework</td>
                            <td>Adam Jarret</td>
                        </tr>
                        <tr>
                            <td>Lowest Missing Homework per Student</td>
                            <td>Adam Jarret</td>
                        </tr>
                        <tr>
                            <td>Highest Missing Homework per Student</td>
                            <td>Rob Jackets</td>
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

        $(document).ready(function() {
            $("#addTeacherButton").click(function() {
                $("#addTeacher").submit();
            });
        });

    </script>

@endsection