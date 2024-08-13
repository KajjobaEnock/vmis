<?php

namespace App\Http\Controllers;

use App\Models\CategorizationOne;
use App\Http\Requests\StoreCategorizationOneRequest;
use App\Http\Requests\UpdateCategorizationOneRequest;

class CategorizationOneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.orgn.cat1.index', [
            'categories' => CategorizationOne::all(),
            'title' => 'Categorization One',
            'subtitle' => 'Categorization Ones List'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.orgn.cat1.create', [
            'title' => 'Categorizations List',
            'subtitle' => 'Create New Categorization'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategorizationOneRequest $request)
    {
        //
        CategorizationOne::create([
            'name' => $request->name,
            'details' => $request->details,
            'status' => 1,
        ]);

        return redirect()->route('categorization-ones.index')
            ->with('success','Categorization Saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategorizationOne $categorizationOne)
    {
        //
        return view('admin.orgn.cat1.show', [
            'category' => $categorizationOne
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategorizationOne $categorizationOne)
    {
        //
        return view('admin.orgn.cat1.edit', [
            'category' => $categorizationOne,
            'title' => 'Categorization One',
            'subtitle' => 'Update Categorization One'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategorizationOneRequest $request, CategorizationOne $categorizationOne)
    {
        //
        $categorizationOne->update([
            'name' => $request->name,
            'grade' => $request->grade,
            'details' => $request->details,
            'status' => $request->status,
        ]);

        return redirect()->route('categorization-ones.index')
            ->with('success','Categorization successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategorizationOne $categorizationOne)
    {
        //
        $categorizationOne->delete();

        return redirect()->route('categorization-ones.index')
            ->with('success','Categorization successfully Updated.');
    }
}
