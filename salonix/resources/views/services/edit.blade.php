@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Service</h2>
    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('services.partials.form', ['buttonText' => 'Update'])
    </form>
</div>
@endsection
