<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Band;
use App\Models\CategorizationOne;
use App\Models\CategorizationTwo;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.orgn.positions.index', [
            'positions' => Position::with('categorizationOne', 'categorizationTwo', 'band', 'team')->get(),
            'title' => 'Positions',
            'subtitle' => 'Positions List'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.orgn.positions.create', [
            'positions' => Position::all(),
            'bands' => Band::all(),
            'teams' => Team::all(),
            'categories1' => CategorizationOne::all(),
            'categories2' => CategorizationTwo::all(),
            'title' => 'Positions List',
            'subtitle' => 'Create New Position'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePositionRequest $request)
    {
        //
        Position::create([
            'name' => $request->name,
            'supervisor' => $request->supervisor,
            'band_id' => $request->band,
            'team_id' => $request->team,
            'categorization_one_id' => $request->category1,
            'categorization_two_id' => $request->category2,
            'details' => $request->details,
            'status' => 1,
            'created_by' => Auth::user()->full_name,
        ]);

        return redirect()->route('positions.index')
            ->with('flash_message','Position created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        //
        return view('admin.orgn.positions.edit', [
            'position' => $position,
            'positions' => Position::all(),
            'bands' => Band::all(),
            'teams' => Team::all(),
            'categories1' => CategorizationOne::all(),
            'categories2' => CategorizationTwo::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePositionRequest $request, Position $position)
    {
        //
        $position->update([
            'name' => $request->name,
            'band_id' => $request->band,
            'team_id' => $request->team,
            'categorization_one_id' => $request->category1,
            'categorization_two_id' => $request->category2,
            'supervisor' => $request->supervisor,
            'details' => $request->details,
            'status' => $request->status,
            'modified_by' => Auth::user()->full_name,
        ]);

        return redirect()->route('positions.index')
            ->with('success','Position Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        //
    }
}
