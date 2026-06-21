@extends('layouts.app')

@section('title', 'Add Employee')

@section('content')
<h3 class="mb-3">Add Employee</h3>

<div class="card bg-white">
    <div class="card-body">
        <form method="POST" action="{{ route('employees.store') }}">
            @csrf
            @include('employees._form')

            <button class="btn btn-primary">Save</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
