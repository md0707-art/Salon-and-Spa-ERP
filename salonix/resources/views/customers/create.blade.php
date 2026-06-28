@extends('layouts.app')

@section('content')
    <h2>Add New Customer</h2>
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        @include('customers.partials.form', ['customer' => null])
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
