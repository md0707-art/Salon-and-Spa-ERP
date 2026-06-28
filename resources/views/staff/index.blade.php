@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Staff List</h1>
    <a href="{{ route('staff.create') }}" class="btn btn-primary">Add New Staff</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
<tbody>
    @forelse($staffs as $member)
        <tr>
            <td>{{ $member->name }}</td>
            <td>{{ $member->email }}</td>
            <td>{{ $member->phone }}</td>
            <td>{{ ucfirst($member->role) }}</td>
            <td>{{ ucfirst($member->status) }}</td>
            <td>
                <a href="{{ route('staff.show', $member) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('staff.edit', $member) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('staff.destroy', $member) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="6" class="text-center">No staff found.</td></tr>
    @endforelse
</tbody>

</table>
@endsection
