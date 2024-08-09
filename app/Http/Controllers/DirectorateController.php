<?php

namespace App\Http\Controllers;

use App\Models\Directorate;
use App\Http\Requests\StoreDirectorateRequest;
use App\Http\Requests\UpdateDirectorateRequest;

class DirectorateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.orgn.directorates.index', [
            'directorates' => Directorate::all(),
            'title' => 'Directorates',
            'subtitle' => 'Directorates List'
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
    public function store(StoreDirectorateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Directorate $directorate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Directorate $directorate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDirectorateRequest $request, Directorate $directorate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Directorate $directorate)
    {
        //
    }
}
