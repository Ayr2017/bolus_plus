<?php

namespace App\Http\Controllers;

use App\Factories\Event\EventFactory;
use App\Factories\EventDecorator\EventDecoratorFactory;
use App\Http\Requests\Event\EventCreateRequest;
use App\Http\Requests\Event\ShowEventRequest;
use App\Http\Requests\Event\StoreEventRequest;
use App\Models\Event;
use App\Models\EventType;
use App\Models\Restriction;
use App\Services\EventService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $events = Event::query()->get();
        $eventTypes = EventType::orderBy('name')->get();

        return view('events.index', [
            'events' => $events,
            'title' => 'Events',
            'event_types' => $eventTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(EventCreateRequest $request):View
    {
        $event_type = EventType
            ::with(['fields'])
            ->firstWhere('slug',$request->input('event_type'));

        return view('events.create', [
            'title' => 'Create Event',
            'event_type' => $event_type,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request, EventService $eventService):RedirectResponse|View
    {
        $event = $eventService->storeEvent($request->validated());
        if($event){
            return redirect(route('events.show', ['event' => $event]))->with('message', 'Event created.');
        }
        return back()->withErrors(['message' => 'Something went wrong. Please try again.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowEventRequest $request, Event $event, EventService $eventService, EventDecoratorFactory $factory):View
    {
       $event = App::make(EventFactory::class, ['event' => $event])->create($event);
       $eventDecorator = $factory->build($event);

        return view('events.show', [
            'title' => 'Event',
            'data' => collect($eventDecorator->getFieldsArray()),
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
