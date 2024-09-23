<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Controller;
use App\Http\Requests\BolusReading\IndexBolusReadingsRequest;
use App\Http\Resources\BolusReading\IndexBolusReadingResource;
use App\Services\BolusReading\BolusReadingService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BolusReadingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexBolusReadingsRequest $request, BolusReadingService $bolusReadingService): Response|AnonymousResourceCollection
    {
        $result = $bolusReadingService->getBolusReadings($request->validated());
        if($result){
            return IndexBolusReadingResource::collection($result);
        }
            return response()->noContent();
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
