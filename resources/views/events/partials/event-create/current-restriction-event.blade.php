<form action="{{route('events.store')}}" method="POST" class="row">
    @csrf
    <input type="hidden" name="event_type" value="{{$event_type}}">
    <div class="col-6">
        <input type="hidden" name="event_type" value="{{$event_type}}">
        <div class="mb-3">
            <label for="data.start_at" class="form-label">Start at</label>
            <input type="datetime-local" class="form-control form-control-sm" id="data.start_at" name="data[start_at]" aria-describedby="data.start_at" value="{{old('data.start_at')}}">
        </div>
        <div class="mb-3">
            <label for="data.end_at" class="form-label">End at</label>
            <input type="datetime-local" class="form-control form-control-sm" id="data.end_at" name="data[end_at]" aria-describedby="data.end_at" value="{{old('data.end_at')}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control form-control-sm">{{old('description')}}</textarea>
        </div>
    </div>

    <div class="my-1 border-top pt-2 border-2">
        <button type="submit" class="btn btn-outline-primary btn-sm">Сохранить</button>
    </div>
</form>
