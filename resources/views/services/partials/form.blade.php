<div class="mb-3">
    <label for="name" class="form-label">Service Name</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $service->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="category_id" class="form-label">Category</label>
    <select name="category_id" id="category_id" class="form-select" required>
        <option value="">-- Select Category --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $service->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>


<div class="mb-3">
    <label for="price" class="form-label">Price (Rs.)</label>
    <input type="number" class="form-control" name="price" step="0.01" value="{{ old('price', $service->price ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="duration_minutes" class="form-label">Duration (Minutes)</label>
    <input type="number" class="form-control" name="duration_minutes" value="{{ old('duration_minutes', $service->duration_minutes ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" class="form-select">
        <option value="active" {{ (old('status', $service->status ?? '') == 'active') ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ (old('status', $service->status ?? '') == 'inactive') ? 'selected' : '' }}>Inactive</option>
    </select>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description', $service->description ?? '') }}</textarea>
</div>

<button type="submit" class="btn btn-success">{{ $buttonText }}</button>