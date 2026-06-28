@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Report Template</h2>
    <form action="{{ route('report-templates.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Template Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Type</label>
            <select name="type" class="form-control" required>
                <option value="">-- Select Type --</option>
                <option value="appointment">Appointment</option>
                <option value="sales">Sales</option>
                <option value="staff">Staff</option>
                <option value="inventory">Inventory</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Filters (JSON)</label>
            <textarea name="filters_json" class="form-control" rows="4">{}</textarea>
        </div>

        <div class="mb-3">
            <label>Created By (User ID)</label>
            <input type="number" name="created_by" class="form-control" required>
        </div>

        <button class="btn btn-success">Create Template</button>
    </form>
</div>
@endsection
