@extends('layouts.overview')

@section('title')SINAP - {{ $homework->name }}@endsection

@section('content')

    <div class="container">
        <div class="col-md-offset-3 col-md-6">
            <br />
            <br />
            <div class="well">You have successfully submitted <a href="/homework/{{ $homework->id }}">{{ $homework->name }}</a>. Click <a href="/homework">here</a> to go to the homework overview page.</div>
        </div>
    </div>

@endsection