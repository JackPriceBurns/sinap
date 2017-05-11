@extends('layouts.overview')

@section('title', 'SINAP - Question')

@section('content')

    <div class="container">
        <div class="col-md-offset-3 col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h3>1) {{ $question->context }}</h3>
                    <div class="col-md-12">
                        @php($p = 'a')
                        @foreach($question->parts as $part)
                            <h3>{{$p}}) {{ strip_tags($part->question) }}</h3>
                            <input type="text" id="answer:{{$question->id}}:{{$part->id}}" name="answer:{{$question->id}}:{{$part->id}}" class="form-control" placeholder="Your answer">
                            @php($p++)
                        @endforeach
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection