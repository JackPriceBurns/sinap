@extends('pages.overview')

@section('custom_css', '')

@section('content')

    <div class="container">

        <h2>Manage - Students</h2>
        <div class="col-md-8">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addstudent">Add Student</button>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addstudents">Add Multiple Students</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#progressyear">Progress Year</button>
            <hr />
            <table class="table table-bordered" style="margin:0;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->year }}</td>
                            <td><a href="/manage/students/delete.{{ $student->id }}">Delete</a> - <a href="/users/{{ $student->id }}">Edit</a> - <a href="/manage/students/increase.{{ $student->id }}">Increase Year</a> - <a href="/manage/students/decrease.{{ $student->id }}">Decrease Year</a></td>
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
                                <td>Students</td>
                                <td>{{ count($students) }}</td>
                            </tr>
                            <tr>
                                <td>Missing Homework</td>
                                <td>n/a</td>
                            </tr>
                            <tr>
                                <td>Completed Homework</td>
                                <td>n/a</td>
                            </tr>
                            <tr>
                                <td>Year 12</td>
                                <td>n/a</td>
                            </tr>
                            <tr>
                                <td>Year 13</td>
                                <td>n/a</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('modal')

    <div class="modal fade" role="dialog" id="addstudent">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Student</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/manage/students/addstudent">

                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="example00@jacsin.org.uk">
                        </div>
                        <div class="form-group">
                            <label for="name">Year</label>
                            <input type="text" class="form-control" id="year" placeholder="12" value="12">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add</button>
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

    </script>

@endsection