<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.orgn.teams.index', [
            'teams' => Team::all(),
            'title' => 'Teams',
            'subtitle' => 'Teams List'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.orgn.teams.create', [
            'title' => 'Teams List',
            'subtitle' => 'Create Team'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        //
        Team::create([
            'name' => $request->name,
            'details' => $request->details,
            'status' => 1,
        ]);

        return redirect()->route('teams.index')
            ->with('success','Team created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
        return view('admin.orgn.teams.show', [
            'team' => $team
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
        return view('admin.orgn.teams.edit', [
            'team' => $team,
            'title' => 'Teams List',
            'subtitle' => 'Update Team Details'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        //
        $team->update([
            'name' => $request->name,
            'details' => $request->details,
            'status' => $request->status,
        ]);

        return redirect()->route('teams.index')
            ->with('success','Team Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
    }
}
