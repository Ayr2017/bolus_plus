<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventType\ShowEventTypeRequest;
use App\Http\Requests\EventType\StoreEventTypeRequest;
use App\Models\EventType;
use App\Services\EventType\EventTypeService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EventTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ShowEventTypeRequest $request):View
    {
        $eventTypes = EventType::orderBy('name')->get();
        return view('event-types.index',[
            'title'=>'Event Types',
            'event_types'=>$eventTypes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event-types.create',[
            'title'=>'Create Event Type',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventTypeRequest $request, EventTypeService  $eventTypeService): RedirectResponse
    {
        $eventType = $eventTypeService->storeEventType($request->validated());
        if($eventType){
            return redirect()->route('event-types.index');
        }

        return back()->withInput()->withErrors(['message' => 'Event type failed to create.']);
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
