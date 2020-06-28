@extends('layouts.admin')

@section('content')

    <div class="panel-body">

        <p><a href="<?= URL::to('admin').'/report' ?>">< To Report</a></p>

        {{ Form::open(['action' => 'Admin\ReportController@store', 'class' => 'form-horizontal', 'method' => 'POST', ]) }}
        {{ csrf_field() }}

            <div class="form-group">
                {{ Form::label('event', 'Report', ['class' => 'col-sm-1 control-label',]) }}

                <div class="col-sm-6">
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    {{ Form::submit('Create report') }}
                </div>
            </div>
        {{ Form::close() }}
    </div>

@endsection