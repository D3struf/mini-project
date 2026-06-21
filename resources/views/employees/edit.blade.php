@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
<h3 class="mb-3">Edit Employee</h3>

<div class="card bg-white">
    <div class="card-body">
        <form method="POST" action="{{ route('employees.update', $employee) }}">
            @csrf
            @method('PUT')
            @include('employees._form')

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
