@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Record New Inventory Purchase</h2>

    <form action="{{ route('inventory-purchase.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="inventory_id" class="form-label">Inventory Item</label>
            <select name="inventory_id" class="form-select" required>
                <option value="">-- Select Item --</option>
                @foreach($inventoryItems as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label for="supplier_name" class="form-label">Supplier</label>
            <input type="text" name="supplier_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="quantity_added" class="form-label">Quantity Added</label>
            <input type="number" step="0.01" name="quantity_added" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="purchase_price" class="form-label">Price Per Unit</label>
            <input type="number" step="0.01" name="purchase_price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="purchase_date" class="form-label">Purchase Date</label>
            <input type="date" name="purchase_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="invoice_number" class="form-label">Invoice/Bill (optional)</label>
            <input type="text" name="invoice_number" class="form-control">
        </div>

        <button class="btn btn-success">Record Purchase</button>
    </form>
</div>
@endsection