<div class="mb-3">
    <label for="name" class="form-label">Item Name</label>
    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $inventoryItem->name ?? '') }}" required>
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="category_id" class="form-label">Category</label>
    <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
        <option value="">-- Select Category --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $inventoryItem->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" step="0.01" id="quantity" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
        value="{{ old('quantity', $inventoryItem->quantity ?? '0') }}" required>
    @error('quantity')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="unit" class="form-label">Unit</label>
    <input type="text" id="unit" name="unit" class="form-control @error('unit') is-invalid @enderror"
        value="{{ old('unit', $inventoryItem->unit ?? '') }}" required>
    @error('unit')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="low_stock_alert" class="form-label">Low Stock Alert Quantity</label>
    <input type="number" step="0.01" id="low_stock_alert" name="low_stock_alert"
        class="form-control @error('low_stock_alert') is-invalid @enderror"
        value="{{ old('low_stock_alert', $inventoryItem->low_stock_alert ?? '0') }}" required>
    @error('low_stock_alert')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="expiry_date" class="form-label">Expiry Date (optional)</label>
    <input type="date" id="expiry_date" name="expiry_date" class="form-control @error('expiry_date') is-invalid @enderror"
        value="{{ old('expiry_date', isset($inventoryItem->expiry_date) ? $inventoryItem->expiry_date->format('Y-m-d') : '') }}">
    @error('expiry_date')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
        <option value="active" {{ (old('status', $inventoryItem->status ?? '') == 'active') ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ (old('status', $inventoryItem->status ?? '') == 'inactive') ? 'selected' : '' }}>Inactive</option>
        <!-- <option value="Low Stock" {{ (old('status', $inventoryItem->status ?? '') == 'Low Stock') ? 'selected' : '' }}>Low Stock</option> -->
    </select>
    @error('status')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-success">{{ $buttonText }}</button>
