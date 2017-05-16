@extends('layouts.overview')

@section('content')

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <h2>Classes</h2>
                @forelse($classes as $class)
                    <div class="col-md-4">
                        <a href="/class/{{ $class->id }}" class="class">
                            <div class="class-heading" style="background-image: url('/img/iquWyQM.jpg');">
                                <h2>{{ $class->name }} - {{ $class->subject->name }}</h2>
                            </div>

                            <div class="class-body">
                                <p>Students: {{ $class->students->count() }} Homework due: 0</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <p>You are not in any classes.</p>
                @endforelse
            </div>
            <div class="row">
                <h2>Classes you Teach</h2>
                @forelse($teaching as $class)
                    <div class="col-md-4">
                        <a href="/class/{{ $class->id }}" class="class">
                            <div class="class-heading" style="background-image: url('/img/iquWyQM.jpg');">
                                <h2>{{ $class->name }} - {{ $class->subject->name }}</h2>
                            </div>

                            <div class="class-body">
                                <p>Students: {{ $class->students()->count() }} Homework due: 0</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <p>You do not teach any classes.</p>
                @endforelse
            </div>
        </div>
    </div>

@endsection