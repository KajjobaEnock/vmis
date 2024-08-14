<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Directorate;
use App\Models\Position;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.orgn.departments.index', [
            'departments' => Department::with('position', 'directorate')->orderBy('id', 'desc')->get(),
            'title' => 'Departments',
            'subtitle' => 'Departments List'
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.orgn.departments.create', [
            'title' => 'Departments List',
            'subtitle' => 'Create Department',
            'positions' => Position::all(),
            'directorates' => Directorate::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        //
        Department::create([
            'name' => $request->name,
            'position_id' => $request->head,
            'directorate_id' => $request->directorate,
            'details' => $request->details,
            'status' => 1,
        ]);

        return redirect()->route('departments.index')
            ->with('success','Department created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
        return view('admin.orgn.departments.edit', [
            'department' => $department,
            'positions' => Position::WHERE('status', 1)->get(),
            'directorates' => Directorate::get()->WHERE('status', 1),
            'title' => 'Departments List',
            'subtitle' => 'Update Department',
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        //
        $department->update([
            'name' => $request->name,
            'directorate_id' => $request->directorate,
            'position_id' => $request->head,
            'details' => $request->details,
            'status' => $request->status,
        ]);

        return redirect()->route('departments.index')
            ->with('success','Department Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }
}
