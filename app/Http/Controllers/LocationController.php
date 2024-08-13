<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.orgn.locations.index', [
            'locations' => Location::all(),
            'title' => 'Duty Stations',
            'subtitle' => 'Duty Stations List'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.orgn.locations.create', [
            'title' => 'Duty Stations List',
            'subtitle' => 'Create Duty Station'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        //
        Location::create([
            'name' => $request->name,
            'details' => $request->details,
            'status' => 1,
        ]);

        return redirect()->route('locations.index')
            ->with('success','Duty Station created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
        return view('admin.orgn.locations.show', [
            'team' => $location
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //
        return view('admin.orgn.locations.edit', [
            'location' => $location,
            'title' => 'Duty Stations List',
            'subtitle' => 'Update Duty Station'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        //
        $location->update([
            'name' => $request->name,
            'details' => $request->details,
            'status' => $request->status,
        ]);

        return redirect()->route('locations.index')
            ->with('success','Duty Station created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        //
    }
}
