@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Dashboard Snapshot</h2>
    <form action="{{ route('dashboard-snapshots.store') }}" method="POST">
        @csrf

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
            <input type="text" name="kpi_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>KPI Value</label>
            <input type="number" step="0.01" name="kpi_value" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Date Range</label>
            <input type="text" name="date_range" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Snapshot Date</label>
            <input type="date" name="snapshot_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Created By (User ID)</label>
            <input type="number" name="created_by" class="form-control" required>
        </div>

        <button class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
