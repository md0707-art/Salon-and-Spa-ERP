@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Report Template</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>There were some errors with your input:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('report-templates.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Template Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Template Type</label>
            <select class="form-select" id="type" name="type" required>
                <option value="">Select Type</option>
                <option value="appointment" {{ old('type') == 'appointment' ? 'selected' : '' }}>Appointment</option>
                <option value="pos" {{ old('type') == 'pos' ? 'selected' : '' }}>POS</option>
                <option value="staff" {{ old('type') == 'staff' ? 'selected' : '' }}>Staff</option>
                <option value="inventory" {{ old('type') == 'inventory' ? 'selected' : '' }}>Inventory</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="filters_json" class="form-label">Filters (JSON)</label>
            <textarea class="form-control" id="filters_json" name="filters_json" rows="4">{{ old('filters_json') }}</textarea>
            <small class="form-text text-muted">Provide filters in JSON format, e.g., {"date_range": "this_week"}</small>
        </div>

        <div class="mb-3">
            <label for="created_by" class="form-label">Created By (User ID)</label>
            <input type="number" class="form-control" id="created_by" name="created_by" required value="{{ old('created_by') }}">
            <small class="form-text text-muted">Enter a valid user ID manually.</small>
        </div>

        <button type="submit" class="btn btn-success">Create Template</button>
        <a href="{{ route('report-templates.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
