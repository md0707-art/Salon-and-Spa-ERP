@extends('layouts.app')

@section('content')
    <h2>Customer Profile</h2>

    <ul class="list-group">
        <li class="list-group-item"><strong>Name:</strong> {{ $customer->name }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $customer->email }}</li>
        <li class="list-group-item"><strong>Phone:</strong> {{ $customer->phone }}</li>
        <li class="list-group-item"><strong>Gender:</strong> {{ $customer->gender }}</li>
        <li class="list-group-item"><strong>DOB:</strong> {{ $customer->date_of_birth }}</li>
        <li class="list-group-item"><strong>Address:</strong> {{ $customer->address }}</li>
        <li class="list-group-item"><strong>Loyalty Points:</strong> {{ $customer->loyalty_points }}</li>
    </ul>

    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary mt-3">Edit</a>
@endsection
