<?php

namespace App\Http\Controllers;

use App\Models\SubCounty;
use App\Http\Requests\StoreSubCountyRequest;
use App\Http\Requests\UpdateSubCountyRequest;

class SubCountyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('settings.localization.subcounties.subcounties',[
            'subcounties' => SubCounty::with('county')->get(),
            'title' => 'Localization Settings',
            'subtitle' => 'Subcounties List',
            'url' => 'subcounties.create',
            'new' => 'Add New Subcounty'
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
    public function store(StoreSubCountyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCounty $subCounty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCounty $subCounty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCountyRequest $request, SubCounty $subCounty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCounty $subCounty)
    {
        //
    }
}
