<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.employees.employees_list',[
            'users' => User::active()->with('employeeType', 'position.band', 'department.directorate', 'line_manager', 'location')->get(),
            'title' => 'Employees',
            'subtitle' => 'Employees List'
        ]);
    }


    //Display a list of active Employees
    public function getActive(){
        return view('admin.employees.employees_list',[
            'users' => User::active()->with('employeeType', 'position.band', 'department.directorate', 'line_manager', 'location')->where('status', 1)->get(),
            'title' => 'Employees',
            'subtitle' => 'Employees List'
        ]);
    }

    //Display a list of Deactivated Employees
    public function getInactive(){
        return view('admin.employees.employees_list',[
            'users' => User::active()->with('employeeType', 'position.band', 'department.directorate', 'line_manager', 'location')->where('status', 0)->get(),
            'title' => 'Employees',
            'subtitle' => 'Employees List'
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
