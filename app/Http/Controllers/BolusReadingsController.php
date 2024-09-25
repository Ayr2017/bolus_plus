<?php

namespace App\Http\Controllers;

use App\Http\Requests\BolusReading\IndexBolusReadingRequest;
use App\Http\Requests\BolusReading\PullBolusReadingRequest;
use App\Models\BolusReading;
use App\Services\BolusReading\BolusReadingService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BolusReadingsController extends Controller
{
    public function __construct(protected BolusReadingService $bolusReadingService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(IndexBolusReadingRequest $request):View
    {
        $bolus_readings = $this->bolusReadingService->getBolusReadings($request->validated());
        return view('bolus-readings.index', [
            'bolus_readings' => $bolus_readings,
            'title' => 'Bolus Readings',
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

    public function pull(PullBolusReadingRequest $request, BolusReadingService $bolusReadingService) : RedirectResponse
    {
        $result = $bolusReadingService->pullBolusReading();
        if($result){
            return back()->with('message', 'Pull Bolus Reading Started Successful');
        }
        return back()->withErrors(['message'=>'Pull Bolus Readings failed!']);
    }
}
