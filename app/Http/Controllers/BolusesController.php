<?php

namespace App\Http\Controllers;

use App\Http\Requests\Bolus\CreateBolusRequest;
use App\Http\Requests\Bolus\IndexBolusRequest;
use App\Http\Requests\Bolus\ShowBolusRequest;
use App\Http\Requests\Bolus\StoreBolusRequest;
use App\Http\Requests\Bolus\UpdateBolusRequest;
use App\Models\Bolus;
use App\Services\Bolus\BolusService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BolusesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexBolusRequest $request):View
    {
        $boluses = Bolus::orderBy('number')->get();
        return view('boluses.index',[
            'boluses' => $boluses,
            'title' => 'Boluses',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateBolusRequest $request)
    {
        return view('boluses.create',[
            'title' => 'Create bolus',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBolusRequest $request, BolusService $bolusService)
    {
        $result = $bolusService->storeBolus($request->validated());
        if($result){
            return redirect()->route('boluses.index')->with('message', 'Bolus created Successfully');
        }

        return redirect()->back()->withErrors(['message'=> 'Bolus not created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowBolusRequest $showBolusRequest,Bolus $bolus)
    {
        return view('boluses.show',[
            'bolus' => $bolus,
            'title' => 'Bolus',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CreateBolusRequest $request, Bolus $bolus)
    {
        return view('boluses.edit',[
            'bolus' => $bolus,
            'title' => 'Edit bolus',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBolusRequest $request, Bolus $bolus, BolusService $bolusService): RedirectResponse
    {
        $bolus = $bolusService->updateBolus($request->validated(), $bolus);
        if($bolus){
            return redirect()
                ->route('boluses.show',['bolus'=>$bolus])
                ->with('message', 'Bolus updated Successfully');
        }

        return redirect()->back()->withErrors(['message'=> 'Bolus not updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bolus $bolus, BolusService $bolusService): RedirectResponse
    {
        $result = $bolusService->deleteBolus($bolus);
        if($result){
            return redirect()->route('boluses.index')->with('message', 'Bolus deleted Successfully');
        }

        return redirect()->back()->withErrors(['message'=> 'Bolus not deleted']);
    }
}
