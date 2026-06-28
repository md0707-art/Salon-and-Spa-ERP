@csrf

{{-- Customer Dropdown --}}
<div class="mb-3">
    <label for="customer_id">Customer</label>
    <select name="customer_id" class="form-control" required>
        <option value="">-- Select Customer --</option>
        @foreach($customers as $customer)
            <option value="{{ $customer->id }}"
                {{ old('customer_id', $appointment->customer_id ?? '') == $customer->id ? 'selected' : '' }}>
                {{ $customer->name }}
            </option>
        @endforeach
    </select>
</div>

{{-- Service --}}
<div class="mb-3">
    <label for="service_id">Service</label>
    <select name="service_id" class="form-control" required>
        <option value="">-- Select Service --</option>
        @foreach($services as $service)
            <option value="{{ $service->id }}"
                {{ old('service_id', $appointment->service_id ?? '') == $service->id ? 'selected' : '' }}>
                {{ $service->name }}
            </option>
        @endforeach
    </select>
</div>

{{-- Staff --}}
<div class="mb-3">
    <label for="staff_id">Staff</label>
    <select name="staff_id" class="form-control">
        <option value="">-- Optional --</option>
        @foreach($staff as $s)
            <option value="{{ $s->id }}"
                {{ old('staff_id', $appointment->staff_id ?? '') == $s->id ? 'selected' : '' }}>
                {{ $s->name }}
            </option>
        @endforeach
    </select>
</div>

{{-- Appointment Date --}}
<div class="mb-3">
    <label for="appointment_date">Date</label>
    <input type="date" name="appointment_date" class="form-control"
        value="{{ old('appointment_date', $appointment->appointment_date ?? '') }}" required>
</div>

{{-- Appointment Time --}}
<div class="mb-3">
    <label for="appointment_time">Time</label>
    <input type="time" name="appointment_time" class="form-control"
        value="{{ old('appointment_time', $appointment->appointment_time ?? '') }}" required>
</div>

{{-- Channel --}}
<div class="mb-3">
    <label for="channel">Channel</label>
    <select name="channel" class="form-control" required>
        <option value="">-- Select Channel --</option>
        <option value="walk-in" {{ old('channel', $appointment->channel ?? '') == 'walk-in' ? 'selected' : '' }}>Walk-in</option>
        <option value="online" {{ old('channel', $appointment->channel ?? '') == 'online' ? 'selected' : '' }}>Online</option>
    </select>
</div>

{{-- Notes --}}
<div class="mb-3">
    <label for="notes">Notes</label>
    <textarea name="notes" class="form-control">{{ old('notes', $appointment->notes ?? '') }}</textarea>
</div>

{{-- Status --}}
<div class="mb-3">
    <label for="status">Status</label>
    <select name="status" class="form-control" required>
        <option value="">-- Select Status --</option>
        <option value="pending" {{ old('status', $appointment->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="confirmed" {{ old('status', $appointment->status ?? '') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
        <option value="canceled" {{ old('status', $appointment->status ?? '') == 'canceled' ? 'selected' : '' }}>Canceled</option>
    </select>
</div>


{{-- Submit --}}
<div class="mb-3">
    <button type="submit" class="btn btn-primary">
        {{ isset($appointment) ? 'Update' : 'Book' }} Appointment
    </button>
</div>
