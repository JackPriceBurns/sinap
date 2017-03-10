@extends((Request::get('authenticated')) ? 'pages.overview' : 'layouts.page')

@section('title', 'SINAP - Home')

@section('body', 'style="background-image:url(\'/img/index.png\');background-repeat: no-repeat;background-size: 200% 200%;"')

@section('content', ' ')

@section('header')
    <div class="header">
        <div class="container">
            <div class="container header-text">
                <h1 align="center">SINAP</h1>
                <h2 align="center">"Get the doing done"</h2>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div class="content content-darker footer">
        <div class="container">
            <p style="text-align:center;">Designed &amp; Developed by Jack Price-Burns</p>
        </div>
    </div>
@endsection