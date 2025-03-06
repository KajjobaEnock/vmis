<?php

namespace App\Http\Controllers;

use App\Models\Veteran;
use App\Http\Requests\StoreVeteranRequest;
use App\Http\Requests\UpdateVeteranRequest;
use App\Models\Parish;
use App\Models\Rank;
use App\Services\Veterans\VeteranService;

class VeteranController extends Controller
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
        return view('veterans.index', [
            'veterans' => $this->veteranService->getAllVeterans(),
            'title' => 'Veterans',
            'subtitle' => 'Veterans List'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('veterans.create', [
            'ranks' => Rank::all(),
            'parishes' => Parish::all(),
            'title' => 'Veterans',
            'subtitle' => 'Create Veteran',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVeteranRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Veteran $veteran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Veteran $veteran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVeteranRequest $request, Veteran $veteran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Veteran $veteran)
    {
        //
    }
}
