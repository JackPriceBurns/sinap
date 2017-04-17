@extends('layouts.page')

@section('title')SINAP - {{ $homework->name }}@endsection

@section('content')

    <div class="container">
        <h2>{{ $homework->name }}</h2>
        <p>{{ $homework->heads_up }}</p>
        <div class="col-md-12">
            @php($q = 1)
            @foreach($homework->questions as $question)
                {{$q}})
                <div class="col-md-12">
                    {{ $question->context }}<br />
                    @php($p = 'a')
                        @foreach($question->parts as $part)
                            {{$p}}) {{ $part->question }}<br />
                        @php($p++)
                    @endforeach
                </div>
                @php($q++)
            @endforeach
        </div>
    </div>

@endsection