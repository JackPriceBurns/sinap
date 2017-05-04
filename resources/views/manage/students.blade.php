@extends('layouts.overview')

@section('custom_css', '')

@section('content')

    <div class="container">

        <h2>Manage - Students</h2>
        <div class="col-md-8">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addstudent">Add Student</button>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addstudents">Add Multiple Students</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#progressYearConfirmation">Progress Year</button>
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
                                <td>{{ \App\User::where('year', '12')->count() }}</td>
                            </tr>
                            <tr>
                                <td>Year 13</td>
                                <td>{{ \App\User::where('year', '13')->count() }}</td>
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
                    <form id="addStudent" method="POST" action="/manage/students/addstudent">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example00@jacsin.org.uk">
                        </div>
                        <div class="form-group">
                            <label for="year">Year</label>
                            <input type="text" class="form-control" id="year" name="year" placeholder="12" value="12">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input id="addStudentButton" type="submit" value="Add" class="btn btn-primary">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" role="dialog" id="addstudents">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Multiple Students</h4>
                </div>
                <div class="modal-body">
                    <form id="addStudents" method="POST" action="/manage/students/addstudents">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="names">Full Names (Separated by commas)</label>
                            <textarea class="form-control" id="names" name="names" placeholder="Full Name 1,Full Name 2,Full Name 3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="emails">Emails (Separated by commas)</label>
                            <textarea class="form-control" id="emails" name="emails" placeholder="example00@jacsin.org.uk,example01@jacsin.org.uk,example02@jacsin.org.uk"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="years">Years (Separated by commas)</label>
                            <textarea class="form-control" id="years" name="years" placeholder="12,13,12,12,12,13,13,13"></textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input id="addStudentsButton" type="submit" value="Add Students" class="btn btn-primary">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" role="dialog" id="progressYearConfirmation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Progress Year Confirmation</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you would like to progress the year?</p>
                    <p class="text-danger text-uppercase"><b>Progressing the year will <kbd>delete</kbd> all year 13 students and classes. <br />All year 12 students will become year 13 students. <br />All year 12 classes will become year 13 classes. <br />This action is not easy to rollback!</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#progressYear">Proceed</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" role="dialog" id="progressYear">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Progress Year</h4>
                </div>
                <div class="modal-body">
                    <form id="progressYearForm" method="POST" action="/manage/students/progressyear">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="emails">Except Students (Separated by commas)</label>
                            <p>These students will be except from the process, these students will loose their classes however will stay in their current year and will not be deleted.</p>
                            <textarea class="form-control" id="emails" name="emails" placeholder="email1,email2,email3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input id="progressYearButton" type="submit" value="Proceed" class="btn btn-danger">
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
            $("#addStudentButton").click(function() {
                $("#addStudent").submit();
            });
            $("#addStudentsButton").click(function() {
                $("#addStudents").submit();
            });
            $("#progressYearButton").click(function() {
                $("#progressYearForm").submit();
            });
        });

    </script>

@endsection