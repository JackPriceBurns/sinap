@extends('layouts.overview')

@section('content')

    <div class="container">

        <h2>Classes</h2>
        @php
            $user = \App\Classes\Auth::get();
            $classes = $user->classes;
            $teaching = $user->teaching;
        @endphp
        <div class="col-md-12">
        @if(count($classes) < 1 && count($teaching) < 1)
            <p>You are not in any classes.</p>
        @else
            @foreach($classes as $class)
                <div class="col-md-4">
                    <a href="/class/{{ $class->id }}" class="class">
                        <div class="class-heading" style="background-image: url('/img/iquWyQM.jpg');">
                            <h2>{{ $class->name }} - {{ $class->subject->name }}</h2>
                        </div>

                        <div class="class-body">
                            <p>Students: {{ count($class->students) }} Homework due: 0</p>
                        </div>
                    </a>
                </div>

            @endforeach
            @if(count($teaching) > 0)
                <h2>Classes you teach.</h2>
                @foreach($teaching as $class)
                    <div class="col-md-4">
                        <a href="/class/{{ $class->id }}" class="class">
                            <div class="class-heading" style="background-image: url('/img/iquWyQM.jpg');">
                                <h2>{{ $class->name }} - {{ $class->subject->name }}</h2>
                            </div>

                            <div class="class-body">
                                <p>Students: {{ count($class->students()) }} Homework due: 0</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        @endif
        </div>
    </div>

@endsection