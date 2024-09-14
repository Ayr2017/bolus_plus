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
                <td>{{$event->id}}</td>
                <td>
                    <a href="{{route('events.show', ['event' => $event])}}">
                        {{$event->event_type}}
                    </a>
                </td>
                <td>{{$event->event_type}}</td>
                <td>{{$event->creator_id}}</td>
                <td>{{$event->event_category}}</td>
                <td>{{$event->created_at}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
