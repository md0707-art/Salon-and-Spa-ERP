@extends('layouts.app')

@section('content')
<h1>Edit Staff: {{ $staff->name }}</h1>

@include('staff.partials.form', ['staff' => $staff, 'action' => route('staff.update', $staff), 'method' => 'PUT'])

<a href="{{ route('staff.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection
