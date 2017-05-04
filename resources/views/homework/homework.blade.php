@extends('layouts.page')

@section('title')SINAP - {{ $homework->name }}@endsection

@section('content')

    <div class="container">
        <div class="col-md-offset-3 col-md-6">

            @php($submittedIDs = array_map(function($obj){ return $obj['homework_id']; }, \App\Classes\Auth::get()->submitted->toArray()))
            @if(in_array($homework->id, $submittedIDs))
                <br />
                <div class="well">You have already submitted this homework!</div>
            @endif

            <form method="POST" action="/homework/{{ $homework->id }}/submit">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h2>{{ $homework->name }}</h2>
                <p>{{ $homework->heads_up }}</p>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        @php($q = 1)
                        @foreach($homework->questions as $question)
                            <h3>{{$q}}) {{ $question->context }}</h3>
                            <div class="col-md-12">
                                @php($p = 'a')
                                @foreach($question->parts as $part)
                                    <h3>{{$p}}) {{ $part->question }}</h3>
                                    <input type="text" id="answer:{{$question->id}}:{{$part->id}}" name="answer:{{$question->id}}:{{$part->id}}" class="form-control" placeholder="Your answer">
                                    @php($p++)
                                @endforeach
                                <br />
                            </div>
                            @php($q++)
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <hr />
                    <input type="submit" class="btn btn-default pull-right" value="Submit">
                </div>
            </form>
        </div>
    </div>

@endsection