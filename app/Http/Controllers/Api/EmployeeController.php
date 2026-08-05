<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $sort = $request->query('sort', 'default');

        $query = Employee::with('department', 'skills');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhereHas('department', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            });
        }

        if ($sort === 'asc') {
            $query->orderBy('last_name', 'asc');
        } elseif ($sort === 'desc') {
            $query->orderBy('last_name', 'desc');
        }

        $employees = $query->paginate(10);

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
