<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employee::orderBy('last_name')->paginate(10);

        return view('employees.index', compact('employees'));
    }

    public function create(): View
    {
        return view('employees.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);

        Employee::create($data);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee): View
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee): View
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee): RedirectResponse
    {
        $data = $this->validateData($request);

        $employee->update($data);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:Male,Female'],
            'birthday' => ['required', 'date', 'before:today'],
            'monthly_salary' => ['required', 'numeric', 'min:0'],
        ]);
    }
}
