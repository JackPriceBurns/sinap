@extends('layouts.overview')

@section('title', 'SINAP - Users')

@section('page_title')
@endsection

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>User Profile</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                    <div class="profile_img">
                        <div id="crop-avatar">
                            <!-- Current avatar -->
                            <img class="img-responsive avatar-view" src="http://placehold.it/500x500" alt="Avatar" title="Change the avatar">
                        </div>
                    </div>
                    <h3>{{ $user->name }}</h3>

                    <ul class="list-unstyled user_data">
                        <li><i class="fa fa-envelope user-profile-icon"></i> {{ $user->email }}</li>
                        <li><i class="fa fa-briefcase user-profile-icon"></i> Year {{ $user->year }}</li>
                    </ul>

                    <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                    <br>

                    <!-- start skills -->
                    <h4>Skills</h4>
                    <ul class="list-unstyled user_data">
                        <li>
                            <p>Homework Completed</p>
                            <div class="progress progress_sm">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50" style="width: 50%;" aria-valuenow="50"></div>
                            </div>
                        </li>
                        <li>
                            <p>Homework Average</p>
                            <div class="progress progress_sm">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70" style="width: 70%;" aria-valuenow="69"></div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="profile_title">
                        <div class="col-md-6">
                            <h2>User Activity Report</h2>
                        </div>
                        <div class="col-md-6">
                            <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>April 22, 2017 - May 21, 2017</span> <b class="caret"></b>
                            </div>
                        </div>
                    </div>
                    <!-- start of user-activity-graph -->
                    <div id="graph_bar" style="width: 100%; height: 280px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="280" version="1.1" width="1170" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.75px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël @@VERSION</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="43.5" y="211.985167404" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.000792404000009">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M56,211.985167404H1145" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="43.5" y="165.238875553" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.004500553000014">750</tspan></text><path fill="none" stroke="#aaaaaa" d="M56,165.238875553H1145" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="43.5" y="118.492583702" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.008208702000005">1,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M56,118.492583702H1145" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="43.5" y="71.746291851" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.011916850999995">2,250</tspan></text><path fill="none" stroke="#aaaaaa" d="M56,71.746291851H1145" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="43.5" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4">3,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M56,25H1145" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="1090.55" y="224.485167404" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,55.8578,681.0208)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.000792404000009">Other</tspan></text><text x="981.65" y="224.485167404" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,14.3644,633.4677)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.000792404000009">iPhone 6S Plus</tspan></text><text x="872.75" y="224.485167404" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,5.7303,563.2674)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.000792404000009">iPhone 6S</tspan></text><text x="763.85" y="224.485167404" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-21.7471,506.2503)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.000792404000009">iPhone 6 Plus</tspan></text><text x="654.95" y="224.485167404" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-30.3841,436.0409)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.000792404000009">iPhone 6</tspan></text><text x="546.05" y="224.485167404" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-53.3533,375.8782)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.000792404000009">iPhone 5S</tspan></text><text x="437.15" y="224.485167404" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-69.7722,311.1178)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.000792404000009">iPhone 5</tspan></text><text x="328.25" y="224.485167404" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-96.4276,253.5361)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.000792404000009">iPhone 3GS</tspan></text><text x="219.35" y="224.485167404" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-112.4369,188.4889)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.000792404000009">iPhone 4S</tspan></text><text x="110.45" y="224.485167404" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-128.8558,123.7286)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.000792404000009">iPhone 4</tspan></text><rect x="69.6125" y="188.30037953282667" width="81.67500000000001" height="23.68478787117334" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="178.5125" y="171.16007252079334" width="81.67500000000001" height="40.825094883206674" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="287.4125" y="194.84486039196668" width="81.67500000000001" height="17.140307012033333" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="396.31250000000006" y="114.06726807343867" width="81.67500000000001" height="97.91789933056134" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="505.21250000000003" y="171.16007252079334" width="81.67500000000001" height="40.825094883206674" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="614.1125" y="77.729817207928" width="81.67500000000001" height="134.25535019607202" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="723.0125" y="140.68149023394133" width="81.67500000000001" height="71.30367717005868" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="831.9125" y="64.20455676570532" width="81.67500000000001" height="147.7806106382947" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="940.8125" y="120.30010698690533" width="81.67500000000001" height="91.68506041709468" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="1049.7124999999999" y="126.532945900372" width="81.67500000000001" height="85.45222150362801" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect></svg><div class="morris-hover morris-default-style" style="left: 57.45px; top: 111px; display: none;"><div class="morris-hover-row-label">iPhone 4</div><div class="morris-hover-point" style="color: #26B99A">
                                Geekbench:
                                380
                            </div></div></div>
                    <!-- end of user-activity-graph -->

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                <!-- start recent activity -->
                                <ul class="messages">
                                    <li>
                                        <img src="images/img.jpg" class="avatar" alt="Avatar">
                                        <div class="message_date">
                                            <h3 class="date text-info">24</h3>
                                            <p class="month">May</p>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">Desmond Davison</h4>
                                            <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                            <br>
                                            <p class="url">
                                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="images/img.jpg" class="avatar" alt="Avatar">
                                        <div class="message_date">
                                            <h3 class="date text-error">21</h3>
                                            <p class="month">May</p>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">Brian Michaels</h4>
                                            <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                            <br>
                                            <p class="url">
                                                <span class="fs1" aria-hidden="true" data-icon=""></span>
                                                <a href="#" data-original-title="">Download</a>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="images/img.jpg" class="avatar" alt="Avatar">
                                        <div class="message_date">
                                            <h3 class="date text-info">24</h3>
                                            <p class="month">May</p>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">Desmond Davison</h4>
                                            <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                            <br>
                                            <p class="url">
                                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="images/img.jpg" class="avatar" alt="Avatar">
                                        <div class="message_date">
                                            <h3 class="date text-error">21</h3>
                                            <p class="month">May</p>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading">Brian Michaels</h4>
                                            <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                            <br>
                                            <p class="url">
                                                <span class="fs1" aria-hidden="true" data-icon=""></span>
                                                <a href="#" data-original-title="">Download</a>
                                            </p>
                                        </div>
                                    </li>

                                </ul>
                                <!-- end recent activity -->

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                <!-- start user projects -->
                                <table class="data table table-striped no-margin">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Project Name</th>
                                        <th>Client Company</th>
                                        <th class="hidden-phone">Hours Spent</th>
                                        <th>Contribution</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>New Company Takeover Review</td>
                                        <td>Deveint Inc</td>
                                        <td class="hidden-phone">18</td>
                                        <td class="vertical-align-mid">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" data-transitiongoal="35" style="width: 35%;" aria-valuenow="35"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>New Partner Contracts Consultanci</td>
                                        <td>Deveint Inc</td>
                                        <td class="hidden-phone">13</td>
                                        <td class="vertical-align-mid">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" data-transitiongoal="15" style="width: 15%;" aria-valuenow="15"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Partners and Inverstors report</td>
                                        <td>Deveint Inc</td>
                                        <td class="hidden-phone">30</td>
                                        <td class="vertical-align-mid">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" data-transitiongoal="45" style="width: 45%;" aria-valuenow="45"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>New Company Takeover Review</td>
                                        <td>Deveint Inc</td>
                                        <td class="hidden-phone">28</td>
                                        <td class="vertical-align-mid">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" data-transitiongoal="75" style="width: 75%;" aria-valuenow="75"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!-- end user projects -->

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                    photo booth letterpress, commodo enim craft beer mlkshk </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <br>
        <div class="row">
            <div class="col-sm-3">
                @if ($user->id == \App\Classes\Auth::get()->id || \App\Classes\Auth::is('Admin') || \App\Classes\Auth::is('Teacher'))
                    <a href="/user/edit/{{ $user->id }}" class="btn btn-danger btn-block btn-compose-email">Edit</a>
                @endif
                <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
                    <li class="active">
                        <a href="#">
                            <i class="fa fa-inbox"></i> Notifications  <span class="label pull-right">2</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope-o"></i> Send Message</a>
                    </li>
                </ul><!-- /.nav -->

                    @if(\App\Classes\Auth::is('Admin'))
                        <h5 class="nav-email-subtitle">Admin Actions</h5>
                        <ul class="nav nav-pills nav-stacked nav-email mb-20 rounded shadow">
                            <li><a href="#">Delete</a></li>
                            <li><a href="#">Promote to Admin</a></li>
                        </ul>
                    @endif
            </div>
            <div class="col-sm-9">

                <div class="panel panel-default">
                    <div class="panel-heading resume-heading">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-xs-12 col-sm-4">
                                    <figure>
                                        <img class="img-circle img-responsive" alt="" src="http://placehold.it/300x300">
                                    </figure>
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <ul class="list-group">
                                        <li class="list-group-item">{{ $user->name }}</li>
                                        <li class="list-group-item">{{ $user->email }}</li>
                                        <li class="list-group-item">Year: {{ $user->year }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bs-callout bs-callout-danger">
                        <h4>Summary</h4>
                        <div class="clearfix">
                            <div class="col-md-4"><p>Completed Homework: n/a</p></div>
                            <div class="col-md-4"><p>Missing Homework: n/a</p></div>
                            <div class="col-md-4"><p>Top Gun Score: n/a</p></div>
                        </div>
                        <div class="progress">
                            <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                                <span class="sr-only">70%</span>
                                <span class="progress-type">Homework</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                                <span class="sr-only">70%</span>
                                <span class="progress-type">Attendance</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                                <span class="sr-only">70%</span>
                                <span class="progress-type">Progress Point Average</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection