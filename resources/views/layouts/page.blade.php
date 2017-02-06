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
    <link rel="stylesheet" href="/css/main.css">

    @yield('custom_css')

    <script src="/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>

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
                    <li><a href="/">Home</a></li>
                    <li><a href="/student">Student</a></li>
                    <li><a href="/teacher">Teacher</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (\App\Classes\Auth::check(true)['success'])
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ \App\Classes\Auth::get()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/overview">Overview</a></li>
                                <li><a href="/user/{{ \App\Classes\Auth::get()->id }}">Profile</a></li>
                                <li><a href="/class">Classes</a></li>
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

    <div class="header-spacer"></div>

    @yield('header')

    @yield('content')

    @section('footer')

        <div class="content content-dark footer-main">
            <div class="container">

                <div class="col-md-4">

                    <h2 align="center">SINAP Web</h2>
                    <p>SINAP is a complete homework assignment and management system designed for colleges. SINAP Web is a website which uses the SINAP API.</p>

                </div>

                <div class="col-md-8 footer-tiles">

                    <div class="col-md-4">
                        <h2 align="center">The API</h2>
                        <p>The API that drives this website and makes everything tick can be found <a href="http://ec2-54-154-205-133.eu-west-1.compute.amazonaws.com/">here</a>. And the documentation for the API can be found <a href="#">Coming Soon</a>. Current version: 0.1 Alpha</p>
                    </div>

                    <div class="col-md-4">
                        <h2 align="center">Links</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/student">Student</a></li>
                            <li><a href="/teacher">Teacher</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4">
                        <h2 align="center">Contact</h2>
                        <ul>
                            <li><p>Email: jackpriceburns@outlook.com</p></li>
                            <li><p>Phone: +44 7974744612</p></li>
                            <li><p>Alternative Email: jackprice-burns15@jacsin.org.uk</p></li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>

        <div class="content content-darker footer">
            <div class="container">
                <p style="text-align:center;">Designed &amp; Developed by Jack Price-Burns</p>
            </div>
        </div>

    @show

    <script src="/js/vendor/jquery-3.1.1.min.js"></script>
    <script src="/js/vendor/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>

</body>
</html>