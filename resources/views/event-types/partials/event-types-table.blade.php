<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Description</th>
            <th>Icon</th>
        </tr>
        </thead>
        <tbody>
        @foreach($event_types as $event_type)
            <tr>
                <td>
                    <a href="{{route('event-types.show',['event_type' => $event_type])}}">
                        {{$event_type->id}}
                    </a>
                </td>
                <td>{{$event_type->name}}</td>
                <td>{{$event_type->slug}}</td>
                <td>{{$event_type->description}}</td>
                <td>{!! $event_type->icon !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
