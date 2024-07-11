<?php

namespace App\Http\Controllers;

use App\Models\UnitMeasurement;
use App\Http\Requests\StoreUnitMeasurementRequest;
use App\Http\Requests\UpdateUnitMeasurementRequest;
use App\Services\UnitMeasurementService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UnitMeasurementController extends Controller
{

    protected $unitMeasurementService;

    public function __construct(UnitMeasurementService $unitMeasurementService)
    {
        $this->unitMeasurementService = $unitMeasurementService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json($this->unitMeasurementService->index($request));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreUnitMeasurementRequest $request): JsonResponse
    {
        return response()->json($this->unitMeasurementService->create($request->all()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnitMeasurementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitMeasurement $unitMeasurement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitMeasurement $unitMeasurement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitMeasurementRequest $request, UnitMeasurement $unitMeasurement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitMeasurement $unitMeasurement)
    {
        //
    }
}
