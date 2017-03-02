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
                    <li><a href="/overview">Overview</a></li>
                    @yield('links')
                </ul>
                <ul class="nav navbar-nav navbar-right">,
                    @if ( Request::get('authenticated') )
                        <li class="dropdown dropdown-notifications hidden-xs">
                            <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                                <i data-count="2" class="glyphicon glyphicon-bell notification-icon"></i>
                            </a>

                            <div class="dropdown-container" style="min-width:400px !important; max-width:500px !important; left: -256px !important;right: 0 !important;">

                                <div class="dropdown-toolbar">
                                    <div class="dropdown-toolbar-actions">
                                        <a href="#">Mark all as read</a>
                                    </div>
                                    <h3 class="dropdown-toolbar-title">Notifications (2)</h3>
                                </div>

                                <ul class="dropdown-menu">

                                    <li class="notification">
                                        <div class="media" style="padding:0 20px">
                                            <div class="media-left">
                                                <div class="media-object">
                                                    <img data-src="holder.js/50x50?bg=cccccc" class="img-circle" alt="50x50" style="width: 50px; height: 50px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2250%22%20height%3D%2250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2050%2050%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_15a2d6c809e%20text%20%7B%20fill%3A%23919191%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_15a2d6c809e%22%3E%3Crect%20width%3D%2250%22%20height%3D%2250%22%20fill%3D%22%23cccccc%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%226.46875%22%20y%3D%2229.5%22%3E50x50%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <strong class="notification-title"><a href="#">Dave Lister</a> commented on <a href="#">DWARF-13 - Maintenance</a></strong>
                                                <p class="notification-desc">I totally don't wanna do it. Rimmer can do it.</p>

                                                <div class="notification-meta">
                                                    <small class="timestamp">27. 11. 2015, 15:00</small>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="notification">
                                        <div class="media" style="padding:0 20px">
                                            <div class="media-left">
                                                <div class="media-object">
                                                    <img data-src="holder.js/50x50?bg=cccccc" class="img-circle" alt="50x50" style="width: 50px; height: 50px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2250%22%20height%3D%2250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2050%2050%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_15a2d6c809e%20text%20%7B%20fill%3A%23919191%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_15a2d6c809e%22%3E%3Crect%20width%3D%2250%22%20height%3D%2250%22%20fill%3D%22%23cccccc%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%226.46875%22%20y%3D%2229.5%22%3E50x50%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <strong class="notification-title"><a href="#">Dave Lister</a> commented on <a href="#">DWARF-13 - Maintenance</a></strong>
                                                <p class="notification-desc">I totally don't wanna do it. Rimmer can do it.</p>

                                                <div class="notification-meta">
                                                    <small class="timestamp">27. 11. 2015, 15:00</small>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <div class="dropdown-footer text-center">
                                    <a href="#">View All</a>
                                </div>

                            </div>
                        </li>
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

    @section('footer')

        <div class="content content-darker footer">
            <div class="container">
                <p style="text-align:center;">Designed &amp; Developed by Jack Price-Burns</p>
            </div>
        </div>

    @show

    @yield('modal')

    <script src="/js/vendor/jquery-3.1.1.min.js"></script>
    <script src="/js/vendor/bootstrap.min.js"></script>
    <script src="/js/vendor/docs.js"></script>
    <script src="/js/vendor/jquery.textcomplete.min.js"></script>
    <script src="/js/main.js"></script>

    @yield('javascript')

</body>
</html>