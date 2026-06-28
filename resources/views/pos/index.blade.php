@extends('layouts.app')

@section('content')
<div class="container">
    <h2>POS Transactions</h2>

    {{-- Show button to create new POS transaction for each appointment --}}
    @foreach ($appointments as $appointment)
        <a href="{{ route('pos.create', $appointment->id) }}" class="btn btn-primary mb-2">
            New Transaction for Appointment #{{ $appointment->id }}
        </a>
    @endforeach

    {{-- Transaction Table --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Customer</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->invoice_number }}</td>
                    <td>{{ $transaction->customer->name ?? 'N/A' }}</td>
                    <td>{{ number_format($transaction->final_amount, 2) }}</td>
                    <td>{{ ucfirst($transaction->payment_status) }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('Y-m-d H:i') }}</td>
                    <td>
                        {{-- Edit --}}
                        <a href="{{ route('pos.edit', $transaction->id) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        {{-- Delete --}}
                        <form action="{{ route('pos.destroy', $transaction->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this transaction?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
