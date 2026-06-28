@php use Carbon\Carbon; @endphp

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(in_array($method, ['PUT', 'PATCH']))
        @method($method)
    @endif

    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"
               id="name" name="name"
               value="{{ old('name', $staff->name ?? '') }}" required>
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror"
               id="email" name="email"
               value="{{ old('email', $staff->email ?? '') }}" required>
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <!-- Phone -->
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror"
               id="phone" name="phone"
               value="{{ old('phone', $staff->phone ?? '') }}" required>
        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <!-- Gender -->
    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select id="gender" name="gender"
                class="form-select @error('gender') is-invalid @enderror" required>
            <option value="">Select Gender</option>
            @foreach(['male', 'female', 'other'] as $gender)
                <option value="{{ $gender }}"
                    {{ old('gender', $staff->gender ?? '') === $gender ? 'selected' : '' }}>
                    {{ ucfirst($gender) }}
                </option>
            @endforeach
        </select>
        @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <!-- Role -->
    <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select id="role" name="role"
                class="form-select @error('role') is-invalid @enderror" required>
            <option value="">Select Role</option>
            @foreach(['stylist', 'therapist', 'admin'] as $role)
                <option value="{{ $role }}"
                    {{ old('role', $staff->role ?? '') === $role ? 'selected' : '' }}>
                    {{ ucfirst($role) }}
                </option>
            @endforeach
        </select>
        @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <!-- Status -->
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select id="status" name="status"
                class="form-select @error('status') is-invalid @enderror" required>
            <option value="">Select Status</option>
            @foreach(['active', 'inactive', 'on_leave'] as $status)
                <option value="{{ $status }}"
                    {{ old('status', $staff->status ?? '') === $status ? 'selected' : '' }}>
                    {{ ucfirst(str_replace('_', ' ', $status)) }}
                </option>
            @endforeach
        </select>
        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <!-- Joining Date -->
    <div class="mb-3">
        <label for="joining_date" class="form-label">Joining Date</label>
        <input type="date" class="form-control @error('joining_date') is-invalid @enderror"
               id="joining_date" name="joining_date"
               value="{{ old('joining_date', isset($staff->joining_date) ? Carbon::parse($staff->joining_date)->format('Y-m-d') : '') }}"
               required>
        @error('joining_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <!-- Photo -->
    <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control @error('photo') is-invalid @enderror"
               id="photo" name="photo" accept="image/*">
        @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror

        @if(!empty($staff->photo))
            <div class="mt-2">
                <img src="{{ asset('storage/' . $staff->photo) }}" alt="Staff Photo" style="max-width: 150px;">
            </div>
        @endif
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-success">Submit</button>
</form>
