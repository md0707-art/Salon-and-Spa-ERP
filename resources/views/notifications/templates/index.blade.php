@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Notification Templates</h2>
    <a href="{{ route('notifications.templates.create') }}" class="btn btn-primary mb-3">Create New Template</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Channel</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($templates as $template)
            <tr>
                <td>{{ $template->title }}</td>
                <td>{{ ucfirst($template->type) }}</td>
                <td>{{ ucfirst($template->channel) }}</td>
                <td>{{ $template->active ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('notifications.templates.edit', $template->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('notifications.templates.destroy', $template->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this template?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr><td colspan="5">No templates found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
