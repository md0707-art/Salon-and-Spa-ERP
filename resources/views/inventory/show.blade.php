@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Inventory Item Details</h2>

    <table class="table table-bordered">
        <tr><th>Name</th><td>{{ $inventoryItem->name }}</td></tr>
        <tr><th>Category</th><td>{{ $inventoryItem->category->name ?? 'N/A' }}</td></tr>
        <tr><th>Quantity</th><td>{{ $inventoryItem->quantity }}</td></tr>
        <tr><th>Unit</th><td>{{ $inventoryItem->unit }}</td></tr>
        <tr><th>Low Stock Alert</th><td>{{ $inventoryItem->low_stock_alert }}</td></tr>
        <tr><th>Expiry Date</th><td>{{ $inventoryItem->expiry_date ? $inventoryItem->expiry_date->format('Y-m-d') : '-' }}</td></tr>
        <tr><th>Status</th><td>{{ ucfirst($inventoryItem->status) }}</td></tr>
        <tr><th>Created At</th><td>{{ $inventoryItem->created_at->format('Y-m-d H:i') }}</td></tr>
        <tr><th>Updated At</th><td>{{ $inventoryItem->updated_at->format('Y-m-d H:i') }}</td></tr>
    </table>

    <a href="{{ route('inventory.edit', $inventoryItem->id) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('inventory.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
