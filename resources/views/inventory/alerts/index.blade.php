@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Low Stock Alerts</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Alert Threshold</th>
                <th>Unit</th>
                <th>Expiry</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lowStockItems as $item)
            <tr class="table-warning">
                <td>{{ $item->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->low_stock_alert }}</td>
                <td>{{ $item->unit }}</td>
                <td>{{ $item->expiry_date ? $item->expiry_date->format('Y-m-d') : '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">All inventory levels are sufficient.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection