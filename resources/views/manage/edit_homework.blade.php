@extends('layouts.overview')

@section('content')

    <div class="container">

        <h2>Questions - {{ $homework->name }} - <a href="/homework/{{ $homework->id }}">View</a></h2>
        <div class="col-md-8">
            <hr />
            <div class="col-md-offset-8">
                <input type="text" class='form-control' id="searchTable" placeholder="Search...">
                <br />
            </div>
            
            <table id="searchableTable" class="table table-bordered" style="margin:0;">
                <thead>
                <tr>
                    <th>Context</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($homework->questions as $question)
                        <tr>
                            <td>{{ $question->context }}</td>
                            <td><a href="/manage/homework/remove.{{ $homework->id }}.{{ $question->id }}">Remove</a> <a href="/manage/questions/{{ $question->id }}/submitted">View</a></td>
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
                            <td>Homework</td>
                            <td>1</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('modal')

    @if ( app('request')->input('add') )
        <div class="modal fade" role="dialog" id="add">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Students</h4>
                    </div>
                    <div class="modal-body">
                        <form id="addStudent" method="POST" action="/manage/classes/addstudent">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <table class="table table-bordered" style="margin:0;">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach (\App\Classroom::find(app('request')->input('add'))->students as $student)
                                        <tr>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <label for="names">Users</label>
                                <br />
                                <input type="text" id="names" name="names" class="form-control" data-list="{{ implode(", ", array_map(function($user){ return $user['email']; }, \App\User::get()->toArray())) }}" data-multiple />
                            </div>

                            <input type="hidden" name="class_id" id="class_id" value="{{ app('request')->input('add') }}">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                        <input id="addStudentButton" type="submit" value="Add Students" class="btn btn-primary">
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
        $(function() { $('#add').modal(); });

        $(document).ready(function() {
            $("#addClassButton").click(function() {
                $("#addClassForm").submit();
            });
            $("#addStudentButton").click(function() {
                $("#addStudent").submit();
            });
        });

        new Awesomplete('input[data-multiple]', {
            filter: function(text, input) {
                return Awesomplete.FILTER_CONTAINS(text, input.match(/[^,]*$/)[0]);
            },

            item: function(text, input) {
                return Awesomplete.ITEM(text, input.match(/[^,]*$/)[0]);
            },

            replace: function(text) {
                var before = this.input.value.match(/^.+,\s*|/)[0];
                this.input.value = before + text + ", ";
            }
        });

    </script>

@endsection