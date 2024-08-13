<?php

namespace App\Http\Controllers;

use App\Models\CategorizationTwo;
use App\Http\Requests\StoreCategorizationTwoRequest;
use App\Http\Requests\UpdateCategorizationTwoRequest;

class CategorizationTwoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.orgn.cat2.index', [
            'categories' => CategorizationTwo::all(),
            'title' => 'Categorization Two',
            'subtitle' => 'Categorization Twos List'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.orgn.cat2.create', [
            'title' => 'Categorizations List',
            'subtitle' => 'Create New Categorization'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategorizationTwoRequest $request)
    {
        //
        CategorizationTwo::create([
            'name' => $request->name,
            'details' => $request->details,
            'status' => 1,
        ]);

        return redirect()->route('categorization-twos.index')
            ->with('success','Categorization Saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategorizationTwo $categorizationTwo)
    {
        //
        return view('admin.orgn.cat2.show', [
            'category' => $categorizationTwo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategorizationTwo $categorizationTwo)
    {
        //
        return view('admin.orgn.cat2.edit', [
            'category' => $categorizationTwo,
            'title' => 'Categorization Twos',
            'subtitle' => 'Update Categorization Two'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategorizationTwoRequest $request, CategorizationTwo $categorizationTwo)
    {
        //
        $categorizationTwo->update([
            'name' => $request->name,
            'grade' => $request->grade,
            'details' => $request->details,
            'status' => $request->status,
        ]);

        return redirect()->route('categorization-twos.index')
            ->with('success','Categorization successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategorizationTwo $categorizationTwo)
    {
        //
        $categorizationTwo->delete();

        return redirect()->route('categorization-twos.index')
            ->with('success','Categorization successfully Updated.');
    }
}
