@extends('layouts.overview')

@section('title', 'SINAP - Question Editor')

@section('content')

    <div class="container">

        <h1>Question Editor</h1>

        <div class="col-md-8">
            <form onsubmit="prepareDivs()" method="POST" action="/manage/questions/submit">
                {{ csrf_field() }}
                <div class="row">
                    <input type="hidden" id="parts-id" name="parts" value="">
                    <div id="question-context" class="question-context" contenteditable="true">Here is where you put your question's pretext, for example &quot;There are n sweets in a bag...&quot;</div>
                    <input type="hidden" id="hidden-question-context" name="question-context" value="">
                </div>
                <div id="parts"></div>
                <div class="row">
                    <div class="col-md-12">
                        <hr />
                        <input id="tags" name="tags" type="text" class="form-control" placeholder="Space separated tags to easily identify this question for example (Core4 Integration)" data-list="{{ implode(", ", array_map(function($tag){ return $tag['tag']; }, \App\Tag::get()->toArray())) }}" data-multiple />
                    </div>
                </div>
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
            <input type="hidden" id="hidden-part-question-{part-id}" name="part-question-{part-id}" value="">
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

            var context = $('div #question-context').html();
            var hidden_context = $('#hidden-question-context');
            hidden_context.val(context);

            for(var x = 0; x < parts; x++){
                var partNum = x+1;
                var question = $('div #part-question-' + (partNum)).html();
                var hidden = $('#hidden-part-question-' + (partNum));
                hidden.val(question);
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

        new Awesomplete('input[data-multiple]', {
            filter: function(text, input) {
                return Awesomplete.FILTER_CONTAINS(text, input.match(/[^,]*$/)[0]);
            },

            item: function(text, input) {
                return Awesomplete.ITEM(text, input.match(/[^,]*$/)[0]);
            },

            replace: function(text) {
                var before = this.input.value.match(/^.+,\s*|/)[0];
                this.input.value = before + text + " ";
            }
        });

    </script>

@endsection