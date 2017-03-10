@extends('pages.overview')

@section('custom_css', '')

@section('content')

    <div class="container">

        <h2>Classes</h2>
        @foreach( \App\Classes\Classroom::get() as $class)
            <div class="col-md-4">
                <a href="/class/someclass" class="class">
                    <div class="class-heading">
                        <img src="/img/iquWyQM.jpg" class="class-heading-img">
                        <h2>{{ $class->name }} - {{ \App\Subject::find($class->subject_id)->name }}</h2>
                    </div>

                    <div class="class-body">
                        <p>Students: {{ count(explode(',', $class->students)) }} Homework due: 0</p>
                    </div>
                </a>
            </div>

        @endforeach
    </div>

@endsection