<?php

namespace App\Http\Controllers;

use App\Models\ExCombatant;
use App\Http\Requests\StoreExCombatantRequest;
use App\Http\Requests\UpdateExCombatantRequest;
use App\Models\Parish;
use App\Models\Rank; 
use App\Services\Veterans\VeteranService;

class ExCombatantController extends Controller
{
    protected $veteranService;

    public function __construct(VeteranService $veteranService)
    {
        $this->veteranService = $veteranService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('veterans.combats.ex_combatants_list', [
            'combatants' => $this->veteranService->getExCombatants(),
            'title' => 'Ex-Combants',
            'subtitle' => 'Ex-Combants List'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('veterans.combats.create', [
            'ranks' => Rank::all(),
            'parishes' => Parish::all(),
            'title' => 'Ex-Combatants',
            'subtitle' => 'Create Ex-Combatant',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExCombatantRequest $request)
    {
        //
        ExCombatant::create([
            'name' => $request->name,
            'claimant_name' => $request->claimant_name,
            'nin' => $request->nin,
            'bank' => $request->bank,
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'village' => $request->village,
            'parish_id' => $request->parish,
            'username' => $request->username,
            'created_by' => Auth::id(),
        ]);
        return redirect()->route('users.index')
            ->with('success','User Details successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExCombatant $exCombatant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExCombatant $exCombatant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExCombatantRequest $request, ExCombatant $exCombatant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExCombatant $exCombatant)
    {
        //
    }
}
