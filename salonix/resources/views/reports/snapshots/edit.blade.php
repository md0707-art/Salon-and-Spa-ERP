@extends('layouts.app')
@section('content')
<form action="{{ route('dashboard-snapshots.update', $dashboardSnapshot->id) }}" method="POST">
    @csrf
    @method('PUT')
   
   @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <div class="mb-3">
        <label>KPI Name</label>
        <input type="text" name="kpi_name" value="{{ old('kpi_name', $dashboardSnapshot->kpi_name) }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>KPI Value</label>
        <input type="number" step="0.01" name="kpi_value" value="{{ old('kpi_value', $dashboardSnapshot->kpi_value) }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Date Range</label>
        <input type="text" name="date_range" value="{{ old('date_range', $dashboardSnapshot->date_range) }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Snapshot Date</label>
        <input type="date" name="snapshot_date" value="{{ old('snapshot_date', $dashboardSnapshot->snapshot_date) }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Created By (User ID)</label>
        <input type="number" name="created_by" value="{{ old('created_by', $dashboardSnapshot->created_by) }}" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Snapshot</button>
</form>
@endsection