@extends('pages.overview')

@section('title', 'SINAP - Users')

@section('content')

    <div class="container">
        <br>
        <h1>Users</h1>

        <hr />
        <div class="col-md-offset-8">
            <input type="text" class='form-control' id="searchTable" placeholder="Search...">
            <br />
        </div>
        <table class="table table-bordered" id="searchableTable">
            <tbody>
                @foreach ($users as $x => $user)
                    @if(($x/3.0) == (int) ($x/3))
                        <tr>
                    @endif
                    <td>
                        <div class="media">
                            <a class="pull-left" href="/user/{{ $user['user']->id }}">
                                <img class="media-object dp img-circle" src="http://placehold.it/500x500" style="width: 100px;height:100px;">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{ $user['user']->name }} <small> {{ ($user['user']->year == 'n/a') ? '' : 'Yr '.$user['user']->year }}</small></h4>
                                <h5>Last Seen: {{ $user['last_seen'] }}</h5>
                                <hr style="margin:8px auto">

                                <span class="label label-danger">{{ $user['role']->name }}</span>
                                @foreach ($user['badges'] as $badge)
                                    <span class="label label-{{ $badge->colour }}">{{ $badge->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </td>
                    @if(($x+2/3.0) == (int) ($x+2/3))
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('modal')

    @if ( app('request')->input('error') )
        <div class="modal fade" role="dialog" id="error">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Error</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{ app('request')->input('error') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@section('javascript')

    <script>

        $(function() { $('#error').modal(); });

    </script>

@endsection