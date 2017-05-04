@extends('layouts.overview')

@section('custom_css')
    <link rel="stylesheet" href="/css/class.css">
@endsection

@section('content')

    <div class="container">

        <h2>Overview</h2>

        <div class="row">
            <div class="col-md-8">
                @section('class.main')
                    <table class="table table-bordered">
                        <tbody>
                        @if(count(\App\News::where('dashboard', 'true')->get()) == 0)
                            <tr>
                                <td>
                                    <div class="portlet">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                                <span class="caption-subject text-uppercase"> Nothing here</span>
                                                <span class="caption-helper"></span>
                                            </div>
                                            <div class="action">
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <p>No one has made a post yet :(</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                        @foreach(\App\News::where('dashboard', 'true')->get() as $news)
                            <tr>
                                <td>
                                    <div class="portlet">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="glyphicon glyphicon-{{ $news->icon }}"></i>
                                                <span class="caption-subject text-uppercase"> {{ $news->title }}</span>
                                                <span class="caption-helper">{{ (new \Carbon\Carbon($news->created_at))->diffForHumans() }}</span>
                                            </div>
                                            <div class="actions">
                                                @if($news->link !== null)
                                                    <a href="{{ $news->link }}" class="btn">
                                                        <i class="glyphicon glyphicon-pencil"></i>
                                                        View
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <p>{{ $news->body }}</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @show
            </div>

            <div class="col-md-4">

                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption caption-green">
                            <i class="glyphicon glyphicon-link"></i>
                            <span class="caption-subject text-uppercase"> Online Users</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-bordered">
                            <tbody>
                            @foreach($activeUsers as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection