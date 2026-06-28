<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $customer->name ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $customer->email ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="phone" value="{{ old('phone', $customer->phone ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Gender</label>
    <select name="gender" class="form-control">
        <option value="">Select</option>
        <option value="Male" {{ old('gender', $customer->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ old('gender', $customer->gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
        <option value="Other" {{ old('gender', $customer->gender ?? '') == 'Other' ? 'selected' : '' }}>Other</option>
    </select>
</div>

<div class="mb-3">
    <label>Date of Birth</label>
    <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $customer->date_of_birth ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Address</label>
    <textarea name="address" class="form-control">{{ old('address', $customer->address ?? '') }}</textarea>
</div>
