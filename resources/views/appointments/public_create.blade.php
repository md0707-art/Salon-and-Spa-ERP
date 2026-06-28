@extends('layouts.app') {{-- or your frontend layout --}}

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Book Your Appointment</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('appointments.public.store') }}">
        @csrf

        <div class="mb-3">
            <label>Name *</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email (optional)</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Phone (optional)</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="mb-3">
            <label>Select Service *</label>
            <select name="service_id" class="form-control" required>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Select Staff *</label>
            <select name="staff_id" class="form-control" required>
                @foreach($staff as $s)
                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Date *</label>
            <input type="date" name="appointment_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Time *</label>
            <input type="time" name="appointment_time" class="form-control" required>
        </div>

        <button class="btn btn-primary">Book Now</button>
    </form>
</div>
@endsection
