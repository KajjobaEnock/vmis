<?php

namespace App\Http\Controllers;

use App\Models\Directorate;
use App\Http\Requests\StoreDirectorateRequest;
use App\Http\Requests\UpdateDirectorateRequest;
use App\Models\Position;

class DirectorateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.orgn.directorates.index', [
            'directorates' => Directorate::with('position')->orderBy('id', 'desc')->get(),
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
        return view('admin.orgn.directorates.create', [
            'title' => 'Directorates List',
            'subtitle' => 'Create Directorate',
            'positions' => Position::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDirectorateRequest $request)
    {
        //
        Directorate::create([
            'name' => $request->name,
            'position_id' => $request->head,
            'details' => $request->details,
            'status' => 1,
        ]);

        return redirect()->route('directorates.index')
            ->with('flash_message','Directorate created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Directorate $directorate)
    {
        //
        return view('admin.directorates.show', [
            'directorate' => $directorate,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Directorate $directorate)
    {
        //
        return view('admin.directorates.edit', [
            'directorate' => $directorate,
            'positions' => Position::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDirectorateRequest $request, Directorate $directorate)
    {
        //
        $directorate->update([
            'name' => $request->name,
            'position_id' => $request->head,
            'details' => $request->details,
            'status' => $request->status,
        ]);

        return redirect()->route('directorates.index')
            ->with('flash_message','Directorate successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Directorate $directorate)
    {
        //
        $directorate->delete();

        return redirect()->route('directorates.index')
            ->with('success','Directorate successfully Deleted.');
    }
}
