<form action="{{route('animals.update',['animal' => $animal])}}" method="POST" class="row">
    @csrf
    @method('PATCH')
    <div class="col-6">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control form-control-sm" id="name" value="{{old('name') ?? $animal->name }}" name="name" aria-describedby="name">
        </div>
        <div class="mb-3">
            <label for="number" class="form-label">Number</label>
            <input type="text" class="form-control form-control-sm" id="number" value="{{old('number') ?? $animal->number }}" name="number" aria-describedby="number">
        </div>
        <div class="mb-3">
            <label for="number_collar" class="form-label">Number collar</label>
            <input type="text" class="form-control form-control-sm" id="number_collar" value="{{old('number_collar') ?? $animal->number_collar }}" name="number_collar"
                   aria-describedby="number_collar">
        </div>
        <div class="mb-3">
            <label for="number_rshn" class="form-label">Number rshn</label>
            <input type="text" class="form-control form-control-sm" id="number_rshn" value="{{old('number_rshn') ?? $animal->number_rshn }}" name="number_rshn"
                   aria-describedby="number_rshn">
        </div>
        <div class="mb-3">
            <label for="number_rf" class="form-label">Number rf</label>
            <input type="text" class="form-control form-control-sm" id="number_rf" value="{{old('number_rf') ?? $animal->number_rf }}" name="number_rf"
                   aria-describedby="number_rf">
        </div>
        <div class="mb-3">
            <label for="number_tavro" class="form-label">Number tavro</label>
            <input type="text" class="form-control form-control-sm" id="number_tavro" value="{{old('number_tavro') ?? $animal->number_tavro }}" name="number_tavro"
                   aria-describedby="number_tavro">
        </div>
        <div class="mb-3">
            <label for="number_tag" class="form-label">Number tag</label>
            <input type="text" class="form-control form-control-sm" id="number_tag" value="{{old('number_tag') ?? $animal->number_tag }}" name="number_tag"
                   aria-describedby="number_tag">
        </div>
        <div class="mb-3">
            <label for="number_collar" class="form-label">Number collar</label>
            <input type="text" class="form-control form-control-sm" id="number_collar" value="{{old('number_collar') ?? $animal->number_collar }}" name="number_collar"
                   aria-describedby="number_collar">
        </div>

    </div>
    <div class="col-6">

        <div class="mb-3">
            <label for="organisation_id" class="form-label">Organisation</label>
            <select class="form-select form-select-sm" aria-label="Пример выбора по умолчанию" id="organisation_id"
                     name="organisation_id">
                @foreach($organisations as $organisation)
                    <option value="{{$organisation->id}}" {{in_array($organisation->id, [old('organisation_id'), $animal->organisation_id]) ? 'selected' : '' }}>{{$organisation->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status_id" class="form-label">Status</label>
            <select class="form-select form-select-sm" aria-label="Пример выбора по умолчанию" id="status_id" name="status_id">
                @foreach($statuses as $status)
                    <option
                        value="{{$status->id}}" {{(old('status_id') ?? $animal->status->id) == $status->id ? 'selected' : ''}}>{{$status->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="sex" class="form-label">Sex</label>
            <select class="form-select form-select-sm" aria-label="Пример выбора по умолчанию" id="sex" name="sex">
                @foreach(['male','female'] as $sex)
                    <option value="{{$sex}}" {{(old('sex') ??$animal->sex )== $sex ? 'selected' : ''}}>{{$sex}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="bolus_id" class="form-label">Bolus</label>
            <select class="form-select form-select-sm" aria-label="Пример выбора по умолчанию" id="bolus_id" name="bolus_id">
                @foreach($boluses as $bolus)
                    <option value="{{$bolus->id}}" {{in_array($bolus->id,[$animal->bolus_id, old('bolus_id')]) ? 'selected' : ''}}>{{$bolus->number}} / {{$bolus->version}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="breed_id" class="form-label">Breed</label>
            <select class="form-select form-select-sm" aria-label="Пример выбора по умолчанию" id="breed_id" name="breed_id">
                @foreach($breeds as $breed)
                    <option value="{{$breed->id}}" {{old('breed_id') == $bolus ? 'selected' : ''}}>{{$breed->name}}</option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="birthday" class="form-label">Birthday</label>
            <input type="datetime-local" class="form-control form-control-sm" id="birthday" value="{{old('birthday') ?? $animal->birthday }}" name="birthday"
                   aria-describedby="birthday">
        </div>

        <div class="mb-3">
            <label for="withdrawn_at" class="form-label">Withdrawn at</label>
            <input type="datetime-local" class="form-control form-control-sm" id="withdrawn_at" value="{{old('withdrawn_at') ?? $animal->withdrawn_at }}" name="withdrawn_at"
                   aria-describedby="withdrawn_at">
        </div>

        <div class="mb-3">
            <label for="tag_color" class="form-label">Tag color</label>
            <input type="color" class="form-control form-control-sm form-control-color" id="tag_color" value="{{old('tag_color') ?? $animal->tag_color }}" name="tag_color"
                   aria-describedby="tag_color">
        </div>
    </div>
    <div class="my-1 border-top pt-2 border-2">
        <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
        <a href="{{route('animals.show',['animal' => $animal])}}" class="btn btn-outline-secondary btn-sm">Show</a>
    </div>
</form>
