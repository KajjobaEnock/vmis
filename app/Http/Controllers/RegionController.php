<?php

namespace App\Http\Controllers;

use App\Models\Rank;
use App\Models\Region;
use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('settings.localization.regions.regions',[
            'regions' => Region::all(),
            'title' => 'Localization Settings',
            'subtitle' => 'Regons List',
            'url' => 'regions.create',
            'new' => 'Add New Region'
        ]);
    }

    public function ranks(){
        
        return view('settings.ranks.ranks',[
            'ranks' => Rank::all(),
            'title' => 'Rank Settings',
            'subtitle' => 'Ranks List',
            'url' => 'ranks.create',
            'new' => 'Add New Rank'
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
    public function store(StoreRegionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegionRequest $request, Region $region)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        //
    }
}
