@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Inventory Purchase History</h2>
    <a href="{{ route('inventory-purchase.create') }}" class="btn btn-primary mb-3">Record New Purchase</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Item</th>
                <th>Supplier</th>
                <th>Qty Added</th>
                <th>Price/Unit</th>
                <th>Purchase Date</th>
                <th>Invoice</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchases as $purchase)
            <tr>
                <td>{{ $purchase->inventoryItem->name }}</td>
                <td>{{ $purchase->supplier_name }}</td>
                <td>{{ $purchase->quantity_added }}</td>
                <td>Rs. {{ $purchase->purchase_price }}</td>
                <td>{{ $purchase->purchase_date->format('Y-m-d') }}</td>
                <td>{{ $purchase->invoice_number ?? '-' }}</td>
                <td>
                    <form action="{{ route('inventory-purchase.destroy', $purchase->id) }}" method="POST" onsubmit="return confirm('Delete this purchase record?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection