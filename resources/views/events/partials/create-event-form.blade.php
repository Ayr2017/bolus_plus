<form action="{{route('events.store')}}" method="POST" class="row">
    @csrf
    <input type="hidden" name="event_type" value="{{$event_type->name}}">
    @foreach($event_type->storeRules as $rule)
        @if( $rule->rules->contains('date'))
            <div class="mb-3">
                <label for="data.start_at" class="form-label">{{$rule->title}}</label>
                <input type="datetime-local" class="form-control form-control-sm" id="data.{{$rule->name}}" name="data[{{$rule->name}}]"
                       aria-describedby="data.start_at" value="{{old('data.'.$rule->name)}}">
            </div>
        @elseif($rule->rules->contains('text'))
            <div class="mb-3">
                <label for="description" class="form-label">{{$rule['title']}}</label>
                <textarea name="data[{{$rule['name']}}]" class="form-control ">{{old('data.'.$rule['name'])}}</textarea>
            </div>
        @endif

    @endforeach
    <div class="my-1 border-top pt-2 border-2">
        <a href="{{route('events.index')}}" class="btn btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-outline-primary">Save</button>
    </div>
</form>
