@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create POS Transaction</h2>
    <form action="{{ route('pos_transactions.store') }}" method="POST">
        @csrf
        @include('pos_transactions._form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
