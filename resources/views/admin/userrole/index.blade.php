@extends('layouts.admin')

@section('content')

    <h1>Users role</h1>

    <p><a href="<?= URL::to('admin').'/userrole/create' ?>">Create new user</a></p>

    <table class="table userrole">
        <tr>
            <th>Users</th>
            <th>Roles</th>
        </tr>
        @foreach ($users as $user)
            <tr data-id="{{$user->id}}">
                <td>{{$user->name}}</td>   
                <td>{{ Form::select('role_id', $roles, $user->role_id, ["class" => 'role_id']) }}</td>
            </tr>
        @endforeach        
    </table>

@endsection