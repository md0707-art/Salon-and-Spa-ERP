@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Notification Logs</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User</th>
                <th>Type</th>
                <th>Channel</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Sent At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
            <tr>
                <td>{{ $log->user->name ?? 'N/A' }}</td>
                <td>{{ ucfirst($log->type) }}</td>
                <td>{{ ucfirst($log->channel) }}</td>
                <td>{{ $log->subject }}</td>
                <td>{{ ucfirst($log->status) }}</td>
                <td>{{ $log->sent_at ? $log->sent_at->format('Y-m-d H:i') : 'Pending' }}</td>
                <td>
                    <a href="{{ route('notifications.logs.show', $log->id) }}" class="btn btn-sm btn-info">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
