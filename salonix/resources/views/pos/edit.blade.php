@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit POS Transaction</h2>
    <form action="{{ route('pos.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('pos._form')
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
