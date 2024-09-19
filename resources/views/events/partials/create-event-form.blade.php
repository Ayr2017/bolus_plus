<form action="{{route('events.store')}}" method="POST" class="row">
    @csrf
    <input type="hidden" name="event_type_id" value="{{$event_type->id}}">
    <x-event.data eventType="{{$event_type->slug}}"></x-event.data>
    <div class="my-1 border-top pt-2 border-2">
        <a href="{{route('events.index')}}" class="btn btn-sm btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-sm btn-outline-primary">Save</button>
    </div>
</form>
