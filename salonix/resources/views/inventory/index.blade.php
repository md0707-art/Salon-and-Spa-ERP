@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Inventory Items</h2>

    <a href="{{ route('inventory.create') }}" class="btn btn-primary mb-3">Add New Item</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Low Stock Alert</th>
                <th>Expiry Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($inventoryItems as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category->name ?? 'N/A' }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->unit }}</td>
                <td>{{ $item->low_stock_alert }}</td>
                <td>{{ $item->expiry_date ? $item->expiry_date->format('Y-m-d') : '-' }}</td>
                <td>{{ ucfirst($item->status) }}</td>
                <td>
                    <a href="{{ route('inventory.show', $item->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No inventory items found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $inventoryItems->links() }}
</div>
@endsection
