@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Service</h2>
    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        @include('services.partials.form', ['buttonText' => 'Save'])
    </form>
</div>
@endsection
