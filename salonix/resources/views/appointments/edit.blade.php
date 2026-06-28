@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Appointment</h2>
    <form method="POST" action="{{ route('appointments.update', $appointment->id) }}">
        @csrf
        @method('PUT')
        @include('appointments._form')
        @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
