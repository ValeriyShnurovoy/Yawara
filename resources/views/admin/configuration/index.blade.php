@extends('layouts.admin')

@section('content')

    <h1>Configurations</h1>

    <table class="table configuration">
        <tr>
            <th>Router name</th>
            @foreach ($roles as $role)
                <th>{{$role->name}}</th>
            @endforeach
        </tr>
        @foreach ($routers as $route)
            <tr data-controller="{{$route}}">
                <td><?php echo ucfirst($route); ?></td>   

                @foreach ($configuration[$route] as $role_id => $role)
                    <td>{{ Form::checkbox('role_id', $role_id, $role, ['class' => 'accessValue', 'data-id' => $role_id]) }}</td>
                @endforeach
            </tr>
        @endforeach        
    </table>

@endsection