@extends('class.class')

@section('class.navbar')
    <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
        <li><a href="/class/{{$classroom->id}}/">News</a></li>
        <li><a href="/class/{{$classroom->id}}/homework">Homework</a></li>
        <li class="active"><a href="/class/{{ $classroom->id }}/stats">Stats</a></li>
    </ul>
@endsection

@section('class.main')



@endsection