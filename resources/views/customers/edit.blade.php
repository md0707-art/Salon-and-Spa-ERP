@extends('layouts.app')

@section('content')
    <h2>Edit Customer</h2>
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('customers.partials.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
