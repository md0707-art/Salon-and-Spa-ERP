@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Report Template</h2>
    <form action="{{ route('report-templates.update', $reportTemplate->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Template Name</label>
            <input type="text" name="name" class="form-control" value="{{ $reportTemplate->name }}" required>
        </div>

        <div class="mb-3">
            <label>Type</label>
            <select name="type" class="form-control" required>
                <option value="appointment" {{ $reportTemplate->type == 'appointment' ? 'selected' : '' }}>Appointment</option>
                <option value="sales" {{ $reportTemplate->type == 'sales' ? 'selected' : '' }}>Sales</option>
                <option value="staff" {{ $reportTemplate->type == 'staff' ? 'selected' : '' }}>Staff</option>
                <option value="inventory" {{ $reportTemplate->type == 'inventory' ? 'selected' : '' }}>Inventory</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Filters (JSON)</label>
            <textarea name="filters_json" class="form-control" rows="4">{{ $reportTemplate->filters_json }}</textarea>
        </div>

        <button class="btn btn-primary">Update Template</button>
    </form>
</div>
@endsection
