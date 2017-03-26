@extends('pages.overview')

@section('custom_css')
    <link rel="stylesheet" href="/css/class.css">
@endsection

@section('content')

    <div class="container">

        <h2>{{ $classroom->name }}</h2>

        <div class="row">
            <div class="col-md-8">
                @section('class.main')
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="glyphicon glyphicon-calendar"></i>
                                            <span class="caption-subject text-uppercase"> Homework M5C3TEST</span>
                                            <span class="caption-helper">12 Hours ago</span>
                                        </div>
                                        <div class="actions">
                                            <a href="javascript:;" class="btn">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                View
                                            </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <p>Get the doing done!</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="glyphicon glyphicon-calendar"></i>
                                            <span class="caption-subject text-uppercase"> Homework M5C3TEST</span>
                                            <span class="caption-helper">12 Hours ago</span>
                                        </div>
                                        <div class="actions">
                                            <a href="javascript:;" class="btn">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                View
                                            </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <p>Get the doing done!</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                            <span class="caption-subject text-uppercase"> Missing Text Book</span>
                                            <span class="caption-helper">12 Hours ago</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <p>A textbook has been misplaced from Mr Watling's classroom, can everyone check if they have this book, he is getting very upset.</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="glyphicon glyphicon-calendar"></i>
                                            <span class="caption-subject text-uppercase"> Homework M5C3TEST</span>
                                            <span class="caption-helper">12 Hours ago</span>
                                        </div>
                                        <div class="actions">
                                            <a href="javascript:;" class="btn">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                View
                                            </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <p>Get the doing done!</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="glyphicon glyphicon-calendar"></i>
                                            <span class="caption-subject text-uppercase"> Homework M5C3TEST</span>
                                            <span class="caption-helper">12 Hours ago</span>
                                        </div>
                                        <div class="actions">
                                            <a href="javascript:;" class="btn">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                View
                                            </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <p>Get the doing done!</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @show
            </div>

            <div class="col-md-4">

                <div class="media">
                    <a class="pull-left" href="/user/{{ $classroom->teacher->id }}">
                        <img class="media-object dp img-circle" src="http://placehold.it/500x500" style="width: 100px;height:100px;">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $classroom->teacher->name }}</h4>
                        <h5>Last Seen: {{ $classroom->teacher->lastSeen() }}</h5>
                        <hr style="margin:8px auto">

                        <span class="label label-danger">{{ $classroom->teacher->role->name }}</span>
                    </div>
                </div>

                <br />

                @section('class.navbar')
                    <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
                        <li class="active"><a href="/class/{{$classroom->id}}/">News</a></li>
                        <li><a href="/class/{{$classroom->id}}/homework">Homework</a></li>
                        <li><a href="#">Notifications</a></li>
                        <li><a href="#">Notifications</a></li>
                    </ul>
                @show

                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption caption-green">
                            <i class="glyphicon glyphicon-paperclip"></i>
                            <span class="caption-subject text-uppercase"> Statistics</span>
                            <span class="caption-helper">Everyone loves stats!</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <h4>Heading Text</h4>
                        <p></p>
                    </div>
                </div>

                <br />

                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption caption-green">
                            <i class="glyphicon glyphicon-link"></i>
                            <span class="caption-subject text-uppercase"> Students</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-bordered">
                            <tbody>
                                @foreach($classroom->students->sortBy('name') as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>
        </div>

    </div>

@endsection