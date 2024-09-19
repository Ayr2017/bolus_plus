<div class="table-responsive">
    <table class="table table-stripped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Event type</th>
            <th>Creator</th>
            <th>Event category</th>
            <th>Created at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <td>
                    <a href="{{route('events.show', ['event' => $event])}}">
                        {{$event->id}}
                    </a>
                    </td>
                <td>
                    <a href="{{route('event-types.show', ['event_type' => $event->event_type_id])}}">
                        {{$event->eventType->name}}
                    </a>
                </td>
                <td>{{$event->creator->name}}</td>
                <td>{{$event->event_category}}</td>
                <td>{{$event->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
