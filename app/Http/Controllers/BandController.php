<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Http\Requests\StoreBandRequest;
use App\Http\Requests\UpdateBandRequest;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.orgn.bands.index', [
            'bands' => Band::all(),
            'title' => 'Bands',
            'subtitle' => 'Bands List'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.orgn.bands.create', [
            'title' => 'Bands List',
            'subtitle' => 'Create New Band'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBandRequest $request)
    {
        //
        Band::create([
            'name' => $request->name,
            'grade' => $request->grade,
            'details' => $request->details,
            'status' => 1,
        ]);

        return redirect()->route('bands.index')
            ->with('success','Band Saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Band $band)
    {
        //
        return view('admin.orgn.bands.show', [
            'band' => $band
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Band $band)
    {
        //
        return view('admin.orgn.bands.edit', [
            'band' => $band,
            'title' => 'Bands List',
            'subtitle' => 'Update Band'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBandRequest $request, Band $band)
    {
        //
        $band->update([
            'name' => $request->name,
            'grade' => $request->grade,
            'details' => $request->details,
            'status' => $request->status,
        ]);

        return redirect()->route('bands.index')
            ->with('success','Band successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Band $band)
    {
        //
        $band->delete();

        return redirect()->route('bands.index')
            ->with('success','Band successfully Deleted.');

    }
}
