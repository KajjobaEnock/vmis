<?php

namespace App\Http\Controllers;

use App\Models\County;
use App\Http\Requests\StoreCountyRequest;
use App\Http\Requests\UpdateCountyRequest;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('settings.localization.counties',[
            'counties' => County::with('district')->get(),
            'title' => 'Localization Settings',
            'subtitle' => 'Counties List',
            'url' => 'counties.create',
            'new' => 'Add New County'
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
    public function store(StoreCountyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(County $county)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(County $county)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountyRequest $request, County $county)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(County $county)
    {
        //
    }
}
