@extends('layouts.page')

@section('title', 'SINAP - Overview')

@section('custom_css', '')

@section('links')

    <li><a href="/manage/widgets">Add Widgets</a></li>
    @yield('custom_links')

@endsection

@section('content')

    @yield('content')

@endsection

@section('footer', ' ')