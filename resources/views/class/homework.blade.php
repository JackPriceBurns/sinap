@extends('class.class')

@section('class.navbar')
    <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
        <li><a href="/class/{{$classroom->id}}/">News</a></li>
        <li class="active"><a href="/class/{{$classroom->id}}/homework">Homework</a></li>
        <li><a href="/class/{{ $classroom->id }}/stats">Stats</a></li>
    </ul>
@endsection

@section('class.main')

    <table class="table table-bordered">
        <tbody>
        @if(count($classroom->homework) < 1)
            <tr>
                <td>
                    <div class="portlet">
                        <div class="portlet-title" style="margin:0;border:0;min-height:20px;">
                            <div class="caption">
                                <i class="glyphicon glyphicon-pencil"></i>
                                <span class="caption-subject text-uppercase"> No Homework!</span>
                                <span class="caption-helper">No homework has been set yet.</span>
                            </div>
                        </div>

                    </div>
                </td>
            </tr>
        @endif
        @foreach($classroom->homework as $homework)
            <tr>
                <td>
                    <div class="portlet">
                        <div class="portlet-title" style="margin:0;border:0;min-height:20px;">
                            <div class="caption">
                                <i class="glyphicon glyphicon-pencil"></i>
                                <span class="caption-subject text-uppercase"> {{ $homework->name }}</span>
                                <span class="caption-helper">Set: {{ (new \Carbon\Carbon($homework->created_at))->diffForHumans() }} Due: {{ (new \Carbon\Carbon($homework->due))->diffForHumans() }}</span>
                            </div>
                            <div class="actions">
                                <a href="/homework/{{ $homework->id }}" class="btn"><i class="glyphicon glyphicon-pencil"></i> View</a>
                            </div>
                        </div>

                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection