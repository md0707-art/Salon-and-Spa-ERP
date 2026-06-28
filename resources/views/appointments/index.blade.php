@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Appointments List</h2>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary mb-3">New Appointment</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Service</th>
                <th>Staff</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
            <tr>
                <td>{{ $appointment->customer->name ?? 'N/A' }}</td>
                <td>{{ $appointment->service->name ?? 'N/A' }}</td>
                <td>{{ $appointment->staff->name ?? 'N/A' }}</td>
                <td>{{ $appointment->appointment_date }}</td>
                <td>{{ $appointment->appointment_time }}</td>
                <td>{{ ucfirst($appointment->status) }}</td>
                <td>
                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this?')">Delete</button>
                    </form>
                    <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-sm btn-info">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
