@extends('layouts.app')

@section('content')
<h1>Add New Staff</h1>

@include('staff.partials.form', ['staff' => null, 'action' => route('staff.store'), 'method' => 'POST'])

<a href="{{ route('staff.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection
