@extends('class.class')

@section('class.navbar')
    <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
        <li><a href="/class/{{$classroom->id}}/">News</a></li>
        <li><a href="/class/{{$classroom->id}}/homework">Homework</a></li>
        <li class="active"><a href="/class/{{ $classroom->id }}/stats">Stats</a></li>
    </ul>
@endsection

@section('class.main')

    <table class="table table-bordered">
        <tbody>
        @forelse($scores as $score)
                <tr>
                    <td>
                        <div class="portlet">
                            <div class="portlet-title" style="margin:0;border:0;min-height:20px;">
                                <div class="caption">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                    <span class="caption-subject text-uppercase"> {{ $score->user->name }}
                                        - {{ $score->score }}%</span>
                                    <span class="caption-helper"></span>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
        @empty
            <tr>
                <td>
                    <div class="portlet">
                        <div class="portlet-title" style="margin:0;border:0;min-height:20px;">
                            <div class="caption">
                                <i class="glyphicon glyphicon-pencil"></i>
                                <span class="caption-subject text-uppercase"> Insufficient Data!</span>
                                <span class="caption-helper">No data has been recorded yet to show anything interesting.</span>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection