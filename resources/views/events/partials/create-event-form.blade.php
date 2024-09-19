<form action="{{route('events.store')}}" method="POST" class="row">
    @csrf
    <input type="hidden" name="event_type_id" value="{{$event_type->id}}">
    @foreach($event_type->fields as $field)
        @switch($field->type )
            @case('datetime-local')
                <div class="mb-3">
                    <label for="data.start_at" class="form-label">{{$field->title}}</label>
                    <input type="datetime-local" class="form-control form-control-sm" id="data.{{$field->name}}" name="data[{{$field->name}}]"
                           aria-describedby="data.start_at" value="{{old($field->name) ?? "2024-01-01T01:09:09"}}">
                </div>
                @break
            @case('text')
                <div class="mb-3">
                    <label for="{{$field->name}}" class="form-label">{{$field->title}}</label>
                    <textarea name="data[{{$field->name}}]" class="form-control">{{old($field->name)}}</textarea>
                </div>
            @break
        @endswitch
    @endforeach
    <div class="my-1 border-top pt-2 border-2">
        <a href="{{route('events.index')}}" class="btn btn-sm btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-sm btn-outline-primary">Save</button>
    </div>
</form>
