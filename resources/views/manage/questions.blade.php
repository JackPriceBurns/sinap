@extends('pages.overview')

@section('title', 'SINAP - Question Editor')

@section('content')

    <div class="container">

        <h1>Question Editor</h1>

        <div class="col-md-8">
            <div id="question-context" class="question-context" contenteditable="true">Here is where you put your question's pretext, for example &quot;There are n sweets in a bag...&quot;</div>
        </div>

        <div class="col-md-4">

        </div>

    </div>

@endsection