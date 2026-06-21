@extends('layouts.app')

@section('title', 'Employees')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Employees</h3>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">+ Add Employee</a>
</div>

<table class="table table-bordered bg-white">
    <thead class="table-light">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Birthday</th>
            <th>Age</th>
            <th>Monthly Salary</th>
            <th style="width: 160px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($employees as $employee)
            <tr>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->gender }}</td>
                <td>{{ $employee->birthday->format('M d, Y') }}</td>
                <td>{{ $employee->age }}</td>
                <td>{{ number_format($employee->monthly_salary, 2) }}</td>
                <td>
                    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                    <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Delete this employee?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7" class="text-center text-muted">No employees yet.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $employees->links() }}
@endsection
