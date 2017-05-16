@extends('layouts.overview')

@section('custom_css')
    <link rel="stylesheet" href="/css/class.css">
@endsection

@section('content')

    <div class="container">

        <h2>Homework Overview</h2>
        <hr />

        <div class="row">
            <div class="col-md-5">
                <p>Due Homework</p>
                <table class="table table-bordered">
                    <tbody>
                    @forelse($due_homework as $homework)
                        <tr>
                            <td>
                                <div class="portlet">
                                    <div class="portlet-title" style="margin:0;border:0;min-height:20px;">
                                        <div class="caption">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                            @php
                                                $due = new \Carbon\Carbon($homework->due);
                                                $due = (!$due->greaterThan(new \Carbon\Carbon())) ? '<font color="cranberry">'.$due->diffForHumans().'</font>' : $due->diffForHumans();
                                            @endphp
                                            <span class="caption-subject text-uppercase"> {{ $homework->name }}</span>
                                            <span class="caption-helper">Set: {{ (new \Carbon\Carbon($homework->created_at))->diffForHumans() }}
                                                Due: {!! $due !!}</span>
                                        </div>
                                        <div class="actions">
                                            <a href="/homework/{{ $homework->id }}" class="btn"><i
                                                        class="glyphicon glyphicon-pencil"></i> View</a>
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
                                            <span class="caption-subject text-uppercase"> No Homework!</span>
                                            <span class="caption-helper">No homework has been set yet.</span>
                                        </div>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <p>Submitted Homework</p>
                <table class="table table-bordered">
                    <tbody>
                    @forelse($submitted_homework as $homework)
                        <tr>
                            <td>
                                <div class="portlet">
                                    <div class="portlet-title" style="margin:0;border:0;min-height:20px;">
                                        <div class="caption">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                            <span class="caption-subject text-uppercase"> {{ $homework->homework->name }}</span>
                                            <span class="caption-helper"> {{ (new \Carbon\Carbon($homework->submitted))->diffForHumans() }}</span>
                                        </div>
                                        <div class="actions">
                                            <a href="/homework/{{ $homework->id }}" class="btn"><i
                                                        class="glyphicon glyphicon-pencil"></i> View</a>
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
                                            <span class="caption-subject text-uppercase"> No Homework!</span>
                                            <span class="caption-helper">All homework marked.</span>
                                        </div>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div class="col-md-3">
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption caption-green">
                            <i class="glyphicon glyphicon-link"></i>
                            <span class="caption-subject text-uppercase"> Recommended for review</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr><td>Some really old homework</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection