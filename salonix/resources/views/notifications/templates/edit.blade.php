@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Notification Template</h2>

    <form action="{{ route('notifications.templates.update', $template->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title', $template->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-select" name="type" required>
                @foreach(['appointment', 'promo', 'greeting', 'alert'] as $type)
                    <option value="{{ $type }}" {{ $template->type == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="channel" class="form-label">Channel</label>
            <select class="form-select" name="channel" required>
                @foreach(['email', 'sms', 'both'] as $channel)
                    <option value="{{ $channel }}" {{ $template->channel == $channel ? 'selected' : '' }}>{{ ucfirst($channel) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" rows="5" class="form-control" required>{{ old('content', $template->content) }}</textarea>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="active" value="1" {{ $template->active ? 'checked' : '' }}>
            <label class="form-check-label">Active</label>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('notifications.templates.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
