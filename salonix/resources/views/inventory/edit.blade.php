@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Inventory Item</h2>

    <form action="{{ route('inventory.update', $inventoryItem->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('inventory.partials.form', ['buttonText' => 'Update Item'])
    </form>
</div>
@endsection
