<?php

namespace App\Http\Controllers;

use App\Models\Parish;
use App\Http\Requests\StoreParishRequest;
use App\Http\Requests\UpdateParishRequest;

class ParishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('settings.localization.parishes.parishes',[
            'parishes' => Parish::with('sub_county')->get(),
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
    public function store(StoreParishRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Parish $parish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parish $parish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParishRequest $request, Parish $parish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parish $parish)
    {
        //
    }
}
