@extends('pages.overview')

@section('custom_css', '')

@section('content')

    <div class="container">

        <h2>Classes</h2>
        @php
            $classes = \App\Classes\Auth::get()->classes;
        @endphp
        @if(count($classes) < 1)
            <p>You are not in any classes.</p>
        @else
            @foreach($classes as $class)
                <div class="col-md-4">
                    <a href="/class/someclass" class="class">
                        <div class="class-heading" style="background-image: url('/img/iquWyQM.jpg');">
                            <h2>{{ $class->name }} - {{ \App\Subject::find($class->subject_id)->name }}</h2>
                        </div>

                        <div class="class-body">
                            <p>Students: {{ count($class->users) }} Homework due: 0</p>
                        </div>
                    </a>
                </div>

            @endforeach
        @endif

    </div>

@endsection