@extends('layouts.app')

@section('content')
<h1>Staff Details</h1>

<table class="table table-bordered">
    <tr><th>Name</th><td>{{ $staff->name }}</td></tr>
    <tr><th>Email</th><td>{{ $staff->email }}</td></tr>
    <tr><th>Phone</th><td>{{ $staff->phone }}</td></tr>
    <tr><th>Gender</th><td>{{ ucfirst($staff->gender) }}</td></tr>
    <tr><th>Role</th><td>{{ ucfirst($staff->role) }}</td></tr>
    <tr><th>Status</th><td>{{ ucfirst($staff->status) }}</td></tr>
    <tr><th>Joining Date</th><td>{{ $staff->joining_date->format('Y-m-d') }}</td></tr>
    @if($staff->photo)
    <tr><th>Photo</th><td><img src="{{ asset('storage/' . $staff->photo) }}" alt="Photo" style="max-width:150px;"></td></tr>
    @endif
</table>

<a href="{{ route('staff.index') }}" class="btn btn-secondary">Back to List</a>
<a href="{{ route('staff.edit', $staff) }}" class="btn btn-warning">Edit</a>
@endsection
