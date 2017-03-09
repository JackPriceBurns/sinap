@extends('pages.overview')

@section('title', 'SINAP - Users')

@section('custom_css', '<link rel="stylesheet" href="/css/user.css">')

@section('content')

    <div class="container">
        <br>
        <div class="row">
            <div class="col-sm-3">
                @if ($user->id == \App\Classes\Auth::get()->id || \App\Classes\Auth::is('Admin') || \App\Classes\Auth::is('Teacher'))
                    <a href="/user/edit/{{ $user->id }}" class="btn btn-danger btn-block btn-compose-email">Edit</a>
                @endif
                <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
                    <li class="active">
                        <a href="#mail-inbox.html">
                            <i class="fa fa-inbox"></i> Notifications  <span class="label pull-right">2</span>
                        </a>
                    </li>
                    <li>
                        <a href="#mail-compose.html"><i class="fa fa-envelope-o"></i> Send Message</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-certificate"></i> Important</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-file-text-o"></i> Drafts <span class="label label-info pull-right inbox-notification">35</span>
                        </a>
                    </li>
                    <li><a href="#"> <i class="fa fa-trash-o"></i> Trash</a></li>
                </ul><!-- /.nav -->

                <h5 class="nav-email-subtitle">More</h5>
                <ul class="nav nav-pills nav-stacked nav-email mb-20 rounded shadow">
                    <li>
                        <a href="#">
                            <i class="fa fa-folder-open"></i> Promotions  <span class="label label-danger pull-right">3</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-folder-open"></i> Job list
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-folder-open"></i> Backup
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-9">

                <div class="panel panel-default">
                    <div class="panel-heading resume-heading">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-xs-12 col-sm-4">
                                    <figure>
                                        <img class="img-circle img-responsive" alt="" src="http://placehold.it/300x300">
                                    </figure>
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <ul class="list-group">
                                        <li class="list-group-item">{{ $user->name }}</li>
                                        <li class="list-group-item">{{ $user->email }}</li>
                                        <li class="list-group-item">Year: {{ $user->year }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bs-callout bs-callout-danger">
                        <h4>Summary</h4>
                        <div class="clearfix">
                            <div class="col-md-4"><p>Completed Homework: n/a</p></div>
                            <div class="col-md-4"><p>Missing Homework: n/a</p></div>
                            <div class="col-md-4"><p>Top Gun Score: n/a</p></div>
                        </div>
                        <div class="progress">
                            <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                                <span class="sr-only">70%</span>
                                <span class="progress-type">Homework</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                                <span class="sr-only">70%</span>
                                <span class="progress-type">Attendance</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                                <span class="sr-only">70%</span>
                                <span class="progress-type">Progress Point Average</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection