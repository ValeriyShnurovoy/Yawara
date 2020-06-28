@extends('layouts.admin')

@section('content')

    <h1>Reports</h1>

    <p><a href="<?= URL::to('admin').'/report/create' ?>">Create new report</a></p>

    <table class="table">
        <tr>
            <th>Name</th>
            <th></th>
        </tr>
        @foreach ($reports as $report)
            <tr>
                <td>{{$report->name}}</td>
                <td>
                    <span class="manage_link"><a href="<?= URL::to('admin').'/report/edit/'.$report->id ?>">Update</a></span>
                    <span class="manage_link"><a href="<?= URL::to('admin').'/report/delete/'.$report->id ?>">Delete</a></span>
                </td>
            </tr>
        @endforeach
        {{ $reports->links() }}
    </table>

@endsection