@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Report Template Details</h2>

    <div class="mb-3">
        <strong>Title:</strong> {{ $template->name }}
    </div>

    <div class="mb-3">
        <strong>Type:</strong> {{ ucfirst($template->type) }}
    </div>

    <div class="mb-3">
        <strong>Filters (JSON):</strong>
        <pre>{{ json_encode($template->filters_json, JSON_PRETTY_PRINT) }}</pre>
    </div>

    <div class="mb-3">
        <strong>Created By:</strong> {{ $template->created_by }}
    </div>

    <div class="mb-3">
        <strong>Created At:</strong> {{ $template->created_at }}
    </div>

    <a href="{{ route('report-templates.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
