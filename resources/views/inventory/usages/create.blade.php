@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Record Inventory Usage</h2>

    <form action="{{ route('inventory-usage.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="inventory_id" class="form-label">Inventory Item</label>
            <select name="inventory_id" class="form-select" required>
                <option value="">-- Select Item --</option>
                @foreach($items as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="service_id" class="form-label">Service</label>
            <select name="service_id" class="form-select" required>
                <option value="">-- Select Service --</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="staff_id" class="form-label">Staff</label>
            <select name="staff_id" class="form-select" required>
                <option value="">-- Select Staff --</option>
                @foreach($staff as $person)
                    <option value="{{ $person->id }}">{{ $person->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity_used" class="form-label">Quantity Used</label>
            <input type="number" step="0.01" name="quantity_used" class="form-control" required>
        </div>

        <button class="btn btn-success">Record Usage</button>
    </form>
</div>
@endsection