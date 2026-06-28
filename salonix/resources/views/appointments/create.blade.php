@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Appointment</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf

        {{-- Existing Customer --}}
        <div class="mb-3">
            <label for="customer_id" class="form-label">Select Existing Customer</label>
            <select name="customer_id" id="customer_id" class="form-control">
                <option value="">-- New Customer --</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
            {{ $customer->name }} ({{ $customer->email }})
        </option>
                @endforeach
            </select>
        </div>

        {{-- New Customer Fields --}}
        <div id="new-customer-fields">
            <div class="mb-3">
                <label for="customer_name" class="form-label">Name</label>
                <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name') }}">
            </div>

            <div class="mb-3">
                <label for="customer_email" class="form-label">Email</label>
                <input type="email" name="customer_email" class="form-control" value="{{ old('customer_email') }}">
            </div>

            <div class="mb-3">
                <label for="customer_phone" class="form-label">Phone</label>
                <input type="text" name="customer_phone" class="form-control" value="{{ old('customer_phone') }}">
            </div>
        </div>

        {{-- Service --}}
        <div class="mb-3">
            <label for="service_id" class="form-label">Service</label>
            <select name="service_id" class="form-control" required>
                <option value="">-- Select Service --</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Staff --}}
        <div class="mb-3">
            <label for="staff_id" class="form-label">Staff (Optional)</label>
            <select name="staff_id" class="form-control">
                <option value="">-- Select Staff --</option>
                @foreach ($staff as $member)
                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Date and Time --}}
        <div class="mb-3">
            <label for="appointment_date" class="form-label">Date</label>
            <input type="date" name="appointment_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="appointment_time" class="form-label">Time</label>
            <input type="time" name="appointment_time" class="form-control" required>
        </div>

        <input type="hidden" name="channel" value="walk-in">

        {{-- Notes --}}
        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea name="notes" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Book Appointment</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const customerSelect = document.getElementById('customer_id');
        const newCustomerFields = document.getElementById('new-customer-fields');

        function toggleNewCustomerFields() {
            if (customerSelect.value) {
                newCustomerFields.style.display = 'none';
            } else {
                newCustomerFields.style.display = 'block';
            }
        }

        customerSelect.addEventListener('change', toggleNewCustomerFields);
        toggleNewCustomerFields(); // run on page load
    });
</script>
@endsection
