@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Inventory Item</h2>

    <form action="{{ route('inventory.store') }}" method="POST">
        @csrf
        @include('inventory.partials.form', ['buttonText' => 'Add Item'])
    </form>
</div>
@endsection
