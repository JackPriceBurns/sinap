@extends('layouts.overview')

@section('custom_css', '')

@section('custom_links')

    <li><a href="/overview">Overview</a></li>
    <li><a href="/class">Classes</a></li>
    @if( \App\Classes\Auth::is('Student') )
        <li><a href="/homework">Homework</a></li>
        <li><a href="/user">Users</a></li>
    @elseif( \App\Classes\Auth::is('Teacher') )
        <li><a href="/homework">Homework</a></li>
        <li><a href="/user">Users</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="/manage/badges">Manage Badges</a></li>
                <li><a href="/manage/students">Manage Students</a></li>
            </ul>
        </li>
    @elseif( \App\Classes\Auth::is('Admin') )
        <li><a href="/user">Users</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="/manage/badges">Manage Badges</a></li>
                <li><a href="/manage/students">Manage Students</a></li>
                <li><a href="/manage/teachers">Manage Teachers</a></li>
                <li><a href="/manage/sessions">Manage Sessions</a></li>
            </ul>
        </li>
    @endif

@endsection

@section('content')

    <div class="container">

        <h2>Overview</h2>

    </div>

@endsection