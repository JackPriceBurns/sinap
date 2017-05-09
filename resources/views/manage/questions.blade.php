@extends('layouts.overview')

@section('title', 'SINAP - Question Editor')

@section('content')

    <div class="container">

        <h1>Question Editor</h1>

        <div class="col-md-8">
            <form onsubmit="prepareDivs()">
                <div class="row">
                    <input type="hidden" id="parts-id" name="parts" value="">
                    <div id="question-context" class="question-context" contenteditable="true">Here is where you put your question's pretext, for example &quot;There are n sweets in a bag...&quot;</div>
                    <input type="hidden" id="question-context" name="question-context" value="">
                </div>
                <div id="parts"></div>
                <div class="row">
                    <div class="col-md-12">
                        <hr />
                        <button type="button" class="btn btn-default" onclick="addPart()">Add Part</button> <input type="submit" onsubmit="" class="btn btn-default" value="Submit Question">
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-4">

        </div>

    </div>

    <div id="part-template" style="display:none;">
    <!--
    <div class="row" id="part">
        {part-id-letter})
        <div class="col-md-12">
            <div id="part-question-{part-id}" class="question-context" contenteditable="true">Here is where you type your question</div>
            <input type="hidden" id="part-question-{part-id}" name="part-question-{part-id}" value="">
            <label>
                Normal Answer(s)
                <input type="radio" name="type:{part-id}" value="a" required>
            </label>
            <label>
                Multiple Choice
                <input type="radio" name="type:{part-id}" value="ma" required>
            </label>
            <input type="text" class="form-control" name="answer:{part-id}" placeholder="-1 2 (multiple answers separated by space)" required>
        </div>
    </div>
    -->
    </div>
@endsection

@section('javascript')

    <script>

        var parts = 0;

        function prepareDivs() {

            for(var x = 0; x < parts; x++){
                var question = $('div #part-question-' + (x+1)).html();
                alert(question);
                $('input #part-question-' + (x+1)).val(question);
                alert('test');
            }

        }

        function addPart() {
            parts++;
            var newPart = $('#part-template').comments();
            var chr = String.fromCharCode(96 + parts);
            newPart = newPart.html().replace(/\{part-id\}/g, parts);
            newPart = newPart.replace(/\{part-id-letter\}/g, chr);
            $('#parts').append(newPart);
            $('#parts-id').val(parts);
            //return null;
        }

    </script>

@endsection