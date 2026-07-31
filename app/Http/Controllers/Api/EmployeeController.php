<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('department', 'skills')->get();
        return response()->json($employees);
    }

    public function show(Employee $employee)
    {
        $employee->load('department', 'skills');
         $employee->image = $employee->image
        ? asset('storage/' . $employee->image)
        : asset('images/placeholder.jpg');
        return response()->json($employee);
    }
}
