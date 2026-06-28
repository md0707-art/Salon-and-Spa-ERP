@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Service Details</h2>

    <p><strong>Name:</strong> {{ $service->name }}</p>
    <p><strong>Category:</strong> {{ $service->category->name ?? 'N/A' }}</p>
    <p><strong>Price:</strong> Rs. {{ $service->price }}</p>
    <p><strong>Duration:</strong> {{ $service->duration_minutes }} min</p>
    <p><strong>Status:</strong> {{ ucfirst($service->status) }}</p>
    <p><strong>Description:</strong> {{ $service->description ?? 'N/A' }}</p>

    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('services.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
