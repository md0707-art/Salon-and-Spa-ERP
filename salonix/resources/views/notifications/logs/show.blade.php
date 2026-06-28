@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Notification Log Details</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>User:</strong> {{ $log->user->name ?? 'N/A' }}</p>
            <p><strong>Type:</strong> {{ ucfirst($log->type) }}</p>
            <p><strong>Channel:</strong> {{ ucfirst($log->channel) }}</p>
            <p><strong>Subject:</strong> {{ $log->subject }}</p>
            <p><strong>Content:</strong></p>
            <pre>{{ $log->content }}</pre>
            <p><strong>Status:</strong> {{ ucfirst($log->status) }}</p>
            <p><strong>Sent At:</strong> {{ $log->sent_at ? $log->sent_at->format('Y-m-d H:i:s') : 'Pending' }}</p>
        </div>
    </div>
    <a href="{{ route('notifications.logs.index') }}" class="btn btn-secondary mt-3">Back to Logs</a>
</div>
@endsection
