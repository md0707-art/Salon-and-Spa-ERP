@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Dashboard Snapshots</h2>
    <a href="{{ route('dashboard-snapshots.create') }}" class="btn btn-primary mb-3">Add Snapshot</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>KPI Name</th>
                <th>Value</th>
                <th>Date Range</th>
                <th>Snapshot Date</th>
                <th>Created By</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($snapshots as $snapshot)
                <tr>
                    <td>{{ $snapshot->kpi_name }}</td>
                    <td>{{ $snapshot->kpi_value }}</td>
                    <td>{{ $snapshot->date_range }}</td>
                    <td>{{ $snapshot->snapshot_date }}</td>
                    <td>{{ $snapshot->created_by }}</td>
                    <td>
                        <a href="{{ route('dashboard-snapshots.edit', $snapshot->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('dashboard-snapshots.destroy', $snapshot->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this snapshot?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
