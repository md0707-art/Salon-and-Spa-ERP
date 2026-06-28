@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Inventory Usage Logs</h2>
    <a href="{{ route('inventory-usage.create') }}" class="btn btn-primary mb-3">Record Usage</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Item</th>
                <th>Service</th>
                <th>Used By</th>
                <th>Quantity Used</th>
                <th>Used On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usages as $usage)
            <tr>
                <td>{{ $usage->inventoryItem->name }}</td>
                <td>{{ $usage->service->name }}</td>
                <td>{{ $usage->staff->name }}</td>
                <td>{{ $usage->quantity_used }}</td>
                <td>{{ \Carbon\Carbon::parse($usage->used_on)->format('Y-m-d H:i') }}</td>

                <td>
                    <form action="{{ route('inventory-usage.destroy', $usage->id) }}" method="POST" onsubmit="return confirm('Delete this usage record?')">
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