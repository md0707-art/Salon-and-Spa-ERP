@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Report Templates</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('report-templates.create') }}" class="btn btn-primary mb-3">Create New Template</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($templates as $template)
            <tr>
                <td>{{ $template->name }}</td>
                <td>{{ ucfirst($template->type) }}</td>
                <td>
                    <span class="badge {{ $template->active ? 'bg-success' : 'bg-secondary' }}">
                        {{ $template->active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('report-templates.edit', $template->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('report-templates.destroy', $template->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this template?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No templates found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
