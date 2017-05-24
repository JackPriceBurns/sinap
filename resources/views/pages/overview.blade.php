@extends('layouts.overview')

@section('page_title')
    Home
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>News</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="dashboard-widget-content">
                                <ul class="list-unstyled timeline widget">
                                    @forelse(\App\News::where('dashboard', 'true')->get() as $news)
                                        <li>
                                            <div class="block">
                                                <div class="block_content">
                                                    <h2 class="title">
                                                        <a>{{ $news->title }}</a>
                                                    </h2>
                                                    <div class="byline">
                                                        <span>{{ (new \Carbon\Carbon($news->created_at))->diffForHumans() }}</span> by <a>{{ $news->poster->name }}</a>
                                                    </div>
                                                    <p class="excerpt">{{ $news->body }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <li>
                                            <div class="block">
                                                <div class="block_content">
                                                    <h2 class="title">
                                                        <a>There are no posts</a>
                                                    </h2>
                                                    <br />
                                                    <p class="excerpt">No one has made a news post yet.</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Online Users</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <ul class="list-unstyled msg_list">
                        @foreach($users as $user)
                            <li><a href="/user/{{ $user->id }}"><span class="image"><img src="http://placehold.it/300x300" alt="img"></span><h5><strong>{{ $user->name }}</strong></h5></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection