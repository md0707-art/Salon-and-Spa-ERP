@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Template Details</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>Title:</strong> {{ $template->title }}</p>
            <p><strong>Type:</strong> {{ ucfirst($template->type) }}</p>
            <p><strong>Channel:</strong> {{ ucfirst($template->channel) }}</p>
            <p><strong>Active:</strong> {{ $template->active ? 'Yes' : 'No' }}</p>
            <p><strong>Content:</strong></p>
            <pre>{{ $template->content }}</pre>
        </div>
    </div>
</div>
@endsection
