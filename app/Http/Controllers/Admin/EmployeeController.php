<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Skill;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('department')->orderBy('last_name', 'asc')->get();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $skills = Skill::all();

        return view('employees.create', compact('departments', 'skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newEmployee = new Employee();
        $newEmployee->name = $data['name'];
        $newEmployee->last_name = $data['last_name'];
        $newEmployee->phone_number = $data['phone_number'];
        $newEmployee->email = $data['email'];
        $newEmployee->department_id = $data['department_id'];

        $newEmployee->save();

        if (isset($data['skills'])) {
            $newEmployee->skills()->attach($data['skills']);
        }

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $employee->load('department', 'skills');
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $skills = Skill::all();

        return view('employees.edit', compact('employee', 'departments', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $data = $request->all();

        $employee->name = $data['name'];
        $employee->department_id = $data['department_id'];

        $employee->save();

        if ($request->has("skills")) {
            $employee->skills()->sync($data["skills"]);
        } else {
            $employee->skills()->detach();
        }

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
