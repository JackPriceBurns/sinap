@extends('layouts.page')

@section('title', 'SINAP - Users')

@section('content')

    <div class="container">
        <br><br><br>
        <h1>Users</h1>

        <hr />
        @foreach ($users as $user)
            <div class="col-md-4">
                <div class="media">
                    <a class="pull-left" href="/user/{{ $user['user']->id }}">
                        <img class="media-object dp img-circle" src="http://placehold.it/500x500" style="width: 100px;height:100px;">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $user['user']->name }} <small> Yr {{ $user['user']->year }}</small></h4>
                        <h5>Last Seen: {{ \App\Classes\Auth::lastSeen($user['user']->id) }}</h5>
                        <hr style="margin:8px auto">

                        <span class="label label-danger">{{ $user['role']->name }}</span>
                        @foreach ($user['badges'] as $badge)
                            <span class="label label-{{ $badge->colour }}">{{ $badge->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection