<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\View\View;

class SummaryController extends Controller
{
    public function index(): View
    {
        $maleCount = Employee::where('gender', 'Male')->count();
        $femaleCount = Employee::where('gender', 'Female')->count();
        $totalSalary = Employee::sum('monthly_salary');

        $averageAge = Employee::all()->avg(function (Employee $employee) {
            return Carbon::parse($employee->birthday)->age;
        });

        return view('summary.index', [
            'maleCount' => $maleCount,
            'femaleCount' => $femaleCount,
            'totalSalary' => $totalSalary,
            'averageAge' => round($averageAge ?? 0, 1),
        ]);
    }
}
