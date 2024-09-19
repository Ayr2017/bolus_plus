<div class="mb-3">
    <label for="data.start_at" class="form-label">Start at:</label>
    <input type="datetime-local" class="form-control form-control-sm" id="data.start_at" name="data[start_at]"
           aria-describedby="data.start_at" value="{{old('start_at') ?? isset($event) ? $event?->data?->get('start_at') : null}}">
</div>
<div class="mb-3">
    <label for="data.end_at" class="form-label">End at:</label>
    <input type="datetime-local" class="form-control form-control-sm" id="data.end_at" name="data[end_at]"
           aria-describedby="data.end_at" value="{{old('end_at') ?? isset($event) ? $event?->data?->get('end_at') : null}}">
</div>
<div class="mb-3">
    <label for="data.restriction_start_at" class="form-label">Restriction start at:</label>
    <input type="datetime-local" class="form-control form-control-sm" id="data.restriction_start_at" name="data[restriction_start_at]"
           aria-describedby="data.restriction_start_at" value="{{old('data.restriction_start_at') ?? isset($event) ? $event?->data?->get('restriction_start_at') : null}}">
</div>
<div class="mb-3">
    <label for="data.restriction_end_at" class="form-label">Restriction end at:</label>
    <input type="datetime-local" class="form-control form-control-sm" id="data.restriction_end_at" name="data[restriction_end_at]"
           aria-describedby="data.restriction_end_at" value="{{old('restriction_end_at') ?? isset($event) ? $event?->data?->get('restriction_end_at') : null}}">
</div>
<div class="mb-3">
    <label for="data.restriction_end_at" class="form-label">Restriction:</label>
    <select class="form-select form-select-sm" id="data.restriction_end_at" name="data[restriction_end_at]"
           aria-describedby="">
        @foreach($restrictions as $restriction)
            <option value="{{$restriction->id}}">{{$restriction->title}}</option>
        @endforeach
    </select>
</div>
<input type="hidden" name="data[restricted_by]" value="{{auth()->id()}}">
<div class="mb-3">
    <label for="data.description" class="form-label">Description</label>
    <textarea id="data.description" name="data[description]" class="form-control">{{old('data.description')}}</textarea>
</div>
