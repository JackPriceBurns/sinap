@extends('pages.overview')

@section('custom_css', '')

@section('content')

    <div class="container">

        <h2>Manage - Students</h2>

        <div class="col-md-8">
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
                            <td><a href="/manage/students/delete.{{ $student->id }}">Delete</a> - <a href="/manage/students/edit.{{ $student->id }}">Edit</a> - <a href="/manage/students/increase.{{ $student->id }}">Increase Year</a> - <a href="/manage/students/decrease.{{ $student->id }}">Decrease Year</a></td>
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
                                <td>209</td>
                            </tr>
                            <tr>
                                <td>Completed Homework</td>
                                <td>10029</td>
                            </tr>
                            <tr>
                                <td>Year 12</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <td>Year 13</td>
                                <td>10</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection