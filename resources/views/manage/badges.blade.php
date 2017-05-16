@extends('layouts.overview')

@section('content')

    <div class="container">

        <h2>Manage - Badges</h2>
        <div class="col-md-8">
            <hr />
            <div class="col-md-offset-8">
                <input type="text" class='form-control' id="searchTable" placeholder="Search...">
                <br />
            </div>
            <table id="searchableTable" class="table table-bordered" style="margin:0;">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Badges</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>
                            @forelse($badges->where('user_id', $user->id) as $badge)
                                <span class="label label-{{ $badge->colour }}">{{ $badge->name }}</span>
                            @empty
                                This user has no badges.
                            @endforelse
                        </td>
                        <td><a href="/manage/badges?view={{ $user->id }}">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Statistics</div>
                <div class="panel-body">
                    <table class="table table-bordered" style="margin:0;">
                        <tbody>
                        <tr>
                            <td>Badges</td>
                            <td>{{ $badges->count() }}</td>
                        </tr>
                        <tr>
                            <td>Red Badges</td>
                            <td>{{ $badges->where('colour', 'danger')->count() }}</td>
                        </tr>
                        <tr>
                            <td>Green Badges</td>
                            <td>{{ $badges->where('colour', 'success')->count() }}</td>
                        </tr>
                        <tr>
                            <td>Yellow Badges</td>
                            <td>{{ $badges->where('colour', 'warning')->count() }}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('modal')

    @if ( app('request')->input('add') )
        <div class="modal fade" role="dialog" id="add">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Badges</h4>
                    </div>
                    <div class="modal-body">
                        <form id="addBadge" method="POST" action="/manage/badges/addbadge">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="names">Text on Badge</label>
                                <input type="text" class="form-control" id="badge" name="badge" placeholder="BEST STUDENT">
                            </div>
                            <div class="form-group">
                                <label for="colour">Badge Colour</label>
                                <select class="form-control" id="colour" name="colour">
                                    <option value="danger">Red</option>
                                    <option value="success">Green</option>
                                    <option value="info">Blue</option>
                                    <option value="primary">Dark Blue</option>
                                    <option value="default">Grey</option>
                                    <option value="warning">Yellow</option>
                                </select>
                            </div>
                            <input type="hidden" name="user_id" id="user_id" value="{{ app('request')->input('add') }}">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                        <input id="addBadgeButton" type="submit" value="Add Badge" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ( app('request')->input('view') )
        <div class="modal fade" role="dialog" id="user">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Sessions</h4>
                    </div>
                    <div class="modal-body">
                        @php
                            $modalBadges = \App\User::find(app('request')->input('view'))->badges;
                        @endphp
                        <a class="btn btn-success" href="/manage/badges?add={{ app('request')->input('view') }}">Add Badge</a>
                        <hr />
                        <table class="table table-bordered" style="margin:0;">
                            <thead>
                            <tr>
                                <th>Badge</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($modalBadges as $badge)
                                <tr>
                                    <td><span class="label label-{{ $badge->colour }}">{{ $badge->name }}</span></td>
                                    <td><a href="/manage/badges/delete.{{ $badge->id }}">Delete</a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

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
        $(function() { $('#user').modal(); });
        $(function() { $('#add').modal(); });

        $(document).ready(function() {
            $("#addBadgeButton").click(function() {
                $("#addBadge").submit();
            });
        });

    </script>

@endsection