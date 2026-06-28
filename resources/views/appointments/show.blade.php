@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Appointment Details</h2>

    <ul class="list-group">
        <li class="list-group-item"><strong>Customer:</strong> {{ $appointment->customer->name ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Service:</strong> {{ $appointment->service->name ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Staff:</strong> {{ $appointment->staff->name ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Date:</strong> {{ $appointment->appointment_date }}</li>
        <li class="list-group-item"><strong>Time:</strong> {{ $appointment->appointment_time }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ ucfirst($appointment->status) }}</li>
        <li class="list-group-item"><strong>Notes:</strong> {{ $appointment->notes }}</li>
    </ul>

    <a href="{{ route('appointments.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
