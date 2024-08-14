<?php

namespace App\Http\Controllers;

use App\Models\EmployeeType;
use App\Http\Requests\StoreEmployeeTypeRequest;
use App\Http\Requests\UpdateEmployeeTypeRequest;
use Illuminate\Support\Facades\Auth;

class EmployeeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.employees.employee_types.index', [
            'employee_types' => EmployeeType::all(),
            'title' => 'Employee Types',
            'subtitle' => 'Employee Types List'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.employees.employee_types.create', [
            'title' => 'Employee Types List',
            'subtitle' => 'Create Employee Type'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeTypeRequest $request)
    {
        //
        EmployeeType::create([
            'name' => $request->name,
            'details' => $request->details,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('employee-types.index')
            ->with('flash_message','Employee Type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployeeType $employeeType)
    {
        //
        return view('admin.employees.employee_types.show', [
            'employee_type' => $employeeType
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeeType $employeeType)
    {
        //
        return view('admin.employees.employee_types.edit', [
            'employee_type' => $employeeType,
            'title' => 'Employee Types List',
            'subtitle' => 'Update Employee Type'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeTypeRequest $request, EmployeeType $employeeType)
    {
        //
        $employeeType->update([
            'name' => $request->name,
            'details' => $request->details,
        ]);

        return redirect()->route('employee-types.index')
            ->with('success','Employee Type updates successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeeType $employeeType)
    {
        //
    }
}
