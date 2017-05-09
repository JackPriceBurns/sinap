<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @section('title')
            SINAP
        @show
    </title>

    <meta name="description" content="">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-dropmenu.min.css">
    <link rel="stylesheet" href="/css/main.css">

    @yield('custom_css')

    <script src="/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body @yield('body')>

    @section('navbar')

    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">SINAP</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    @yield('links')
                </ul>
                <ul class="nav navbar-nav navbar-right">,
                    @if ( Request::get('authenticated') )

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ \App\Classes\Auth::get()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/overview">Overview</a></li>
                                <li><a href="/user/{{ \App\Classes\Auth::get()->id }}">Profile</a></li>
                                <li><a href="/notifications">Notifications</a></li>
                                <li><a href="/settings">Settings</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li><a href="/login">Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @show

    <div class="header-spacer"></div>

    @yield('header')

    @yield('content')

    @yield('footer')

    @yield('modal')

    <script src="/js/vendor/jquery-3.1.1.min.js"></script>
    <script src="/js/vendor/jquery-ui.min.js"></script>
    <script src="/js/vendor/jquery-comments.js"></script>
    <script src="/js/vendor/bootstrap.min.js"></script>
    <script src="/js/vendor/docs.js"></script>
    <script src="/js/main.js"></script>

    @yield('javascript')

</body>
</html>