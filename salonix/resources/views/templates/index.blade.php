@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Report Templates</h2>
    <a href="{{ route('report-templates.create') }}" class="btn btn-primary mb-3">Add Template</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Created By</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($templates as $template)
                <tr>
                    <td>{{ $template->name }}</td>
                    <td>{{ ucfirst($template->type) }}</td>
                    <td>{{ $template->created_by }}</td>
                    <td>{{ $template->created_at }}</td>
                    <td>
                        <a href="{{ route('report-templates.edit', $template->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('report-templates.destroy', $template->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this template?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
