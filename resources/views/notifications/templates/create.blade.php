@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Notification Template</h2>

    <form action="{{ route('notifications.templates.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-select" name="type" required>
                <option value="">Select Type</option>
                @foreach(['appointment', 'promo', 'greeting', 'alert'] as $type)
                    <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="channel" class="form-label">Channel</label>
            <select class="form-select" name="channel" required>
                <option value="">Select Channel</option>
                @foreach(['email', 'sms', 'both'] as $channel)
                    <option value="{{ $channel }}" {{ old('channel') == $channel ? 'selected' : '' }}>{{ ucfirst($channel) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" rows="5" class="form-control" required>{{ old('content') }}</textarea>
            <small>Use placeholders like <code>{customer_name}</code>, <code>{appointment_date}</code></small>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="active" value="1" {{ old('active') ? 'checked' : '' }}>
            <label class="form-check-label">Active</label>
        </div>

        <button class="btn btn-success">Create</button>
        <a href="{{ route('notifications.templates.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
