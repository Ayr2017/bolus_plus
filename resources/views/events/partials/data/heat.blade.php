<div class="mb-3">
    <label for="data.start_at" class="form-label">Start at:</label>
    <input type="datetime-local" class="form-control form-control-sm" id="data.start_at" name="data[start_at]"
           aria-describedby="data.start_at" value="{{old('data.start_at') ?? (isset($event) ? $event?->data?->get('start_at') : null)}}">
</div>
<div class="mb-3">
    <label for="data.end_at" class="form-label">End at:</label>
    <input type="datetime-local" class="form-control form-control-sm" id="data.end_at" name="data[end_at]"
           aria-describedby="data.end_at" value="{{old('data.end_at') ?? (isset($event) ? $event?->data?->get('end_at') : null)}}">
</div>
<div class="mb-3">
    <label for="data.insemination_start_at" class="form-label">Insemination start at:</label>
    <input type="datetime-local" class="form-control form-control-sm" id="data.insemination_start_at" name="data[insemination_start_at]"
           aria-describedby="data.insemination_start_at" value="{{old('data.insemination_start_at') ?? (isset($event) ? $event?->data?->get('insemination_start_at') : null)}}">
</div>
<div class="mb-3">
    <label for="data.insemination_end_at" class="form-label">Insemination end at:</label>
    <input type="datetime-local" class="form-control form-control-sm" id="data.insemination_end_at" name="data[insemination_end_at]"
           aria-describedby="data.insemination_end_at" value="{{old('data.insemination_end_at') ?? (isset($event) ? $event?->data?->get('insemination_end_at') : null)}}">
</div>
<div class="mb-3">
    <label for="data.is_inseminated" class="form-label">Is inseminated:</label>
    <input type="checkbox" class="form-check form-check-sm" id="data.is_inseminated" name="data[is_inseminated]"
           aria-describedby="data.is_inseminated" value="{{old('data.is_inseminated') ?? (isset($event) ? $event?->data?->get('is_inseminated') : null)}}">
</div>
