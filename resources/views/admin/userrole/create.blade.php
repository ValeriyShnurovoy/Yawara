@extends('layouts.admin')

@section('content')

    <div class="panel-body">

        <p><a href="<?= URL::to('admin').'/userrole' ?>">< To Users role</a></p>

        {{ Form::open(['action' => 'Admin\UserRoleController@store', 'class' => 'form-horizontal', 'method' => 'POST', ]) }}
        {{ csrf_field() }}

            <div class="form-group">
                {{ Form::label('user_name', 'User name', ['class' => 'col-sm-1 control-label',]) }}

                <div class="col-sm-6">
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('email', 'E-mail', ['class' => 'col-sm-1 control-label',]) }}

                <div class="col-sm-6">
                    {{ Form::email('email', null, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('password', 'Password', ['class' => 'col-sm-1 control-label',]) }}

                <div class="col-sm-6">
                    {{ Form::password('password', null, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('user_role', 'User Role', ['class' => 'col-sm-1 control-label',]) }}

                <div class="col-sm-6">
                    {{ Form::select('role_id', $role_selector, 1) }}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    {{ Form::submit('Create user') }}
                </div>
            </div>
        {{ Form::close() }}
    </div>

@endsection