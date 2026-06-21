@extends('layouts.app')

@section('title', 'Summary')

@section('content')
<h3 class="mb-4">Summary</h3>

<div class="row g-3">
    <div class="col-md-4">
        <div class="card bg-white shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Employees by Gender</h6>
                <p class="mb-1">Male: <strong>{{ $maleCount }}</strong></p>
                <p class="mb-0">Female: <strong>{{ $femaleCount }}</strong></p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-white shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Average Age</h6>
                <p class="fs-3 mb-0">{{ $averageAge }} yrs</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-white shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Total Monthly Salary</h6>
                <p class="fs-3 mb-0">{{ number_format($totalSalary, 2) }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
