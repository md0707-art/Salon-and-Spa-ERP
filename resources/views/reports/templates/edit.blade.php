@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Report Template</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the following issues:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('report-templates.update', $template->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Template Name</label>
            <input type="text" class="form-control" id="name" name="name" required
                   value="{{ old('name', $template->name) }}">
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Template Type</label>
            <select class="form-select" id="type" name="type" required>
                <option value="">Select Type</option>
                <option value="appointment" {{ old('type', $template->type) == 'appointment' ? 'selected' : '' }}>Appointment</option>
                <option value="pos" {{ old('type', $template->type) == 'pos' ? 'selected' : '' }}>POS</option>
                <option value="staff" {{ old('type', $template->type) == 'staff' ? 'selected' : '' }}>Staff</option>
                <option value="inventory" {{ old('type', $template->type) == 'inventory' ? 'selected' : '' }}>Inventory</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="filters_json" class="form-label">Filters (JSON)</label>
            <textarea class="form-control" id="filters_json" name="filters_json" rows="4" required>{{ old('filters_json', $template->filters_json) }}</textarea>
            <small class="form-text text-muted">Example: {"date_range": "this_week"}</small>
        </div>

        <div class="mb-3">
            <label for="created_by" class="form-label">Created By</label>
            <input type="text" class="form-control" id="created_by" name="created_by" readonly
                   value="{{ $template->created_by }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Template</button>
        <a href="{{ route('report-templates.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
