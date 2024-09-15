<?php

namespace App\Http\Controllers;

use App\Enums\EventTypesEnum;
use App\Http\Requests\Event\EventCreateRequest;
use App\Http\Requests\Event\ShowEventRequest;
use App\Http\Requests\Event\StoreEventRequest;
use App\Models\Event\Event;
use App\Services\EventService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::query()->get();
        $eventTypesEnum = EventTypesEnum::cases();
        return view('events.index', [
            'events' => $events,
            'title' => 'Events',
            'event_types' => $eventTypesEnum,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(EventCreateRequest $request)
    {
        $formName = Str::kebab($request->event_type);
        $eventType = $request->event_type;

        return view('events.create', [
            'title' => 'Create Event',
            'form_name' => $formName,
            'event_type' => $eventType,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request, EventService $eventService):RedirectResponse|View
    {
        $event = $eventService->storeEvent($request->validated());
        if($event){
            return view('events.show', [
                'event' => $event,
                'title' => '',
                ])->with('message', 'Event created.');
        }
        return back()->withErrors(['message' => 'Something went wrong. Please try again.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowEventRequest $request, Event $event)
    {
        return view('events.show', [
            'title' => 'Event',
            'event' => $event,
        ]);
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
