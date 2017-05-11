@extends('layouts.overview')

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
                        @if( \App\Classes\Auth::is("Teacher") || \App\Classes\Auth::is("Admin") )
                        <tr>
                            <td>
                                <form method="POST" action="/class/{{ $classroom->id }}/post">
                                    {{ csrf_field() }}
                                    <div class="portlet">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <span class="caption-subject text-uppercase"> <input type="text" id="title" name="title" class="form-control" placeholder="Title"> </span>
                                            </div>
                                            <div class="actions">
                                                <input type="text" id="link" name="link" class="form-control" placeholder="link (can be blank)">
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <textarea style="resize:vertical;" class="form-control" id="body" name="body" placeholder="This is the body of your post"></textarea>
                                            <br />
                                            <input type="submit" class="btn btn-default pull-right" value="post">
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @foreach($classroom->news as $news)
                            <tr>
                                <td>
                                    <div class="portlet">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="glyphicon glyphicon-{{ $news->icon }}"></i>
                                                <span class="caption-subject text-uppercase"> {{ $news->title }}</span>
                                                <span class="caption-helper">{{ (new \Carbon\Carbon($news->created_at))->diffForHumans() }}</span>
                                            </div>
                                            <div class="actions">
                                                @if($news->link !== null)
                                                <a href="{{ $news->link }}" class="btn">
                                                    <i class="glyphicon glyphicon-pencil"></i>
                                                    View
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <p>{{ $news->body }}</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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
                        <li><a href="/class/{{ $classroom->id }}/stats">Statistics</a></li>
                    </ul>
                @show

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