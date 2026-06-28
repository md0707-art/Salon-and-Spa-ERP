<div class="mb-3">
    <label for="appointment_id">Appointment</label>
    <input type="number" name="appointment_id" class="form-control" value="{{ old('appointment_id', $transaction->appointment_id ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="customer_id">Customer</label>
    <input type="number" name="customer_id" class="form-control" value="{{ old('customer_id', $transaction->customer_id ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="total_amount">Total Amount</label>
    <input type="number" step="0.01" name="total_amount" class="form-control" value="{{ old('total_amount', $transaction->total_amount ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="discount">Discount</label>
    <input type="number" step="0.01" name="discount" class="form-control" value="{{ old('discount', $transaction->discount ?? 0) }}">
</div>

<div class="mb-3">
    <label for="loyalty_points_used">Loyalty Points</label>
    <input type="number" name="loyalty_points_used" class="form-control" value="{{ old('loyalty_points_used', $transaction->loyalty_points_used ?? 0) }}">
</div>

<div class="mb-3">
    <label for="final_amount">Final Amount</label>
    <input type="number" step="0.01" name="final_amount" class="form-control" value="{{ old('final_amount', $transaction->final_amount ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="payment_method">Payment Method</label>
    <select name="payment_method" class="form-control" required>
        <option value="cash" {{ (old('payment_method', $transaction->payment_method ?? '') == 'cash') ? 'selected' : '' }}>Cash</option>
        <option value="card" {{ (old('payment_method', $transaction->payment_method ?? '') == 'card') ? 'selected' : '' }}>Card</option>
        <option value="wallet" {{ (old('payment_method', $transaction->payment_method ?? '') == 'wallet') ? 'selected' : '' }}>Digital Wallet</option>
    </select>
</div>

<div class="mb-3">
    <label for="payment_status">Payment Status</label>
    <select name="payment_status" class="form-control" required>
        <option value="pending" {{ (old('payment_status', $transaction->payment_status ?? '') == 'pending') ? 'selected' : '' }}>Pending</option>
        <option value="paid" {{ (old('payment_status', $transaction->payment_status ?? '') == 'paid') ? 'selected' : '' }}>Paid</option>
        <option value="refunded" {{ (old('payment_status', $transaction->payment_status ?? '') == 'refunded') ? 'selected' : '' }}>Refunded</option>
    </select>
</div>

<div class="mb-3">
    <label for="transaction_date">Transaction Date</label>
    <input type="datetime-local" name="transaction_date" class="form-control" value="{{ old('transaction_date', isset($transaction) ? \Carbon\Carbon::parse($transaction->transaction_date)->format('Y-m-d\TH:i') : '') }}">
</div>
