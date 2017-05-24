<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome/font-awesome.min.css" rel="stylesheet">
    <link href="/css/nprogress/nprogress.css" rel="stylesheet">

    <link href="/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md footer_fixed">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="/" class="site_title"><i class="fa fa-pencil"></i> <span>SINAP</span></a>
                </div>

                <div class="clearfix"></div>

                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="http://placehold.it/300x300" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{ \App\Classes\Auth::get()->name }}</h2>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <br />

                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="/"><i class="fa fa-home"></i> Home </a>
                            <li><a href="/user"><i class="fa fa-group"></i> Users </a>
                            <li><a><i class="fa fa-calculator"></i> Work <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/homework">Homework</a></li>
                                    <li><a href="/class">Classes</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i> Manage <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/manage/badges">Badges</a></li>
                                    <li><a href="/manage/classes">Classrooms</a></li>
                                    <li><a href="/manage/students">Students</a></li>
                                    <li><a href="/manage/teachers">Teachers</a></li>
                                    <li><a href="/manage/questions">Questions</a></li>
                                    <li><a href="/manage/homeworks">Homeworks</a></li>
                                    <li><a href="/manage/sessions">Sessions</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="http://placehold.it/300x300" alt="{{ \App\Classes\Auth::get()->name }}">{{ \App\Classes\Auth::get()->name }}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="/user/{{ \App\Classes\Auth::get()->id }}"> Profile</a></li>
                                <li><a href="#"><span>Settings</span></a></li>
                                <li><a href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="#" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">1</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span class="image"><img src="http://placehold.it/300x300" alt="Profile Image" /></span>
                                        <span>
                                          <span>John Smith</span>
                                          <span class="time">3 mins ago</span>
                                        </span>
                                        <span class="message">Film festivals used to be do-or-die moments for movie makers. They were where...</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>@yield('page_title')</h3>
                    </div>
                </div>

                <div class="clearfix"></div>

                @yield('content')
            </div>
        </div>

        <footer>
            <div class="pull-right">Designed and Developed by Jack Price-Burns</div>
            <div class="clearfix"></div>
        </footer>
    </div>
</div>

<script src="/js/jquery/jquery.min.js"></script>
<script src="/js/bootstrap/bootstrap.min.js"></script>
<script src="/js/fastclick/fastclick.js"></script>
<script src="/js/nprogress/nprogress.js"></script>

<script src="/js/custom.min.js"></script>
</body>
</html>
