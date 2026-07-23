<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();

        return view("departments.index", compact("departments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("departments.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newDepartment = new Department();
        $newDepartment->name = $data['name'];
        $newDepartment->address = $data['address'];
        $newDepartment->phone_number = $data['phone_number'];
        $newDepartment->email = $data['email'];
        $newDepartment->description = $data['description'];

        $newDepartment->save();

        return redirect()->route("departments.index", $newDepartment);
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view("departments.show", compact("department"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view("departments.edit", compact("department"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $data = $request->all();

        $department->name = $data['name'];
        $department->address = $data['address'];
        $department->phone_number = $data['phone_number'];
        $department->email = $data['email'];
        $department->description = $data['description'];

        $department ->update();

        return redirect()->route('departments.show', $department);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index');
    }
}
