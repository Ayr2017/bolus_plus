<form action="{{route('boluses.update',['bolus' =>$bolus])}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="number" class="form-label">Number</label>
        <input type="text" class="form-control form-control-sm" id="number"  value="{{$bolus->number}}" name="number" aria-describedby="number" >
    </div>
    <div class="mb-3">
        <label for="version" class="form-label">Version</label>
        <input type="text" class="form-control form-control-sm" id="version"  value="{{$bolus->version}}" name="version" aria-describedby="version">
    </div>
    <div class="mb-3">
        <label for="batch_number" class="form-label">Batch number</label>
        <input type="text" class="form-control form-control-sm" id="batch_number"  value="{{$bolus->batch_number}}" name="batch_number" aria-describedby="batch_number">
    </div>
    <div class="mb-3">
        <label for="produced_at" class="form-label">Produced at</label>
        <input type="datetime-local" class="form-control form-control-sm" id="produced_at"  value="{{$bolus->produced_at}}" name="produced_at" aria-describedby="produced_at">
    </div>
    <button type="submit" class="btn btn-outline-primary btn-sm">Обновить</button>
    <a class="btn btn-sm btn-outline-secondary" href="{{route('boluses.show',['bolus' => $bolus])}}">Отмена</a>
</form>
