@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Services</h2>
    <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Add Service</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->category->name ?? 'N/A' }}</td>
                    <td>Rs. {{ $service->price }}</td>
                    <td>{{ $service->duration_minutes }} min</td>
                    <td>{{ ucfirst($service->status) }}</td>
                    <td>
                        <a href="{{ route('services.show', $service->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this service?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
