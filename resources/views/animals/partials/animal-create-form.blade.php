<form action="{{route('animals.store')}}" method="POST" class="row">
    @csrf
    <div class="col-6">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control " id="name" name="name" aria-describedby="name">
        </div>
        <div class="mb-3">
            <label for="number" class="form-label">Number</label>
            <input type="text" class="form-control " id="number" name="number" aria-describedby="number">
        </div>
        <div class="mb-3">
            <label for="number_collar" class="form-label">Number collar</label>
            <input type="text" class="form-control " id="number_collar" name="number_collar"
                   aria-describedby="number_collar">
        </div>
        <div class="mb-3">
            <label for="number_rshn" class="form-label">Number rshn</label>
            <input type="text" class="form-control " id="number_rshn" name="number_rshn"
                   aria-describedby="number_rshn">
        </div>
        <div class="mb-3">
            <label for="number_rf" class="form-label">Number rf</label>
            <input type="text" class="form-control " id="number_rf" name="number_rf"
                   aria-describedby="number_rf">
        </div>
        <div class="mb-3">
            <label for="number_tavro" class="form-label">Number tavro</label>
            <input type="text" class="form-control " id="number_tavro" name="number_tavro"
                   aria-describedby="number_tavro">
        </div>
        <div class="mb-3">
            <label for="number_tag" class="form-label">Number tag</label>
            <input type="text" class="form-control " id="number_tag" name="number_tag"
                   aria-describedby="number_tag">
        </div>
        <div class="mb-3">
            <label for="number_collar" class="form-label">Number collar</label>
            <input type="text" class="form-control " id="number_collar" name="number_collar"
                   aria-describedby="number_collar">
        </div>

    </div>
    <div class="col-6">

        <div class="mb-3">
            <label for="organisation_id" class="form-label">Organisation</label>
            <select class="form-select " aria-label="Пример выбора по умолчанию" id="organisation_id"
                    name="organisation_id">
                @foreach($organisations as $organisation)
                    <option value="{{$organisation->id}}">{{$organisation->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status_id" class="form-label">Status</label>
            <select class="form-select " aria-label="Пример выбора по умолчанию" id="status_id"
                    name="status_id">
                @foreach($statuses as $status)
                    <option
                        value="{{$status->id}}" {{old('status_id') == $status->id ? 'selected' : ''}}>{{$status->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="sex" class="form-label">Sex</label>
            <select class="form-select " aria-label="Пример выбора по умолчанию" id="sex" name="sex">
                @foreach(['male','female'] as $sex)
                    <option value="{{$sex}}" {{old('sex') == $sex ? 'selected' : ''}}>{{$sex}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="bolus_id" class="form-label">Bolus</label>
            <select class="form-select " aria-label="Пример выбора по умолчанию" id="bolus_id" name="bolus_id">
                @foreach($boluses as $bolus)
                    <option value="{{$bolus->id}}" {{old('bolus_id') == $bolus ? 'selected' : ''}}>{{$bolus->number}} / {{$bolus->version}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="breed_id" class="form-label">Breed</label>
            <select class="form-select " aria-label="Пример выбора по умолчанию" id="breed_id" name="breed_id">
                @foreach($breeds as $breed)
                    <option value="{{$breed->id}}" {{old('breed_id') == $bolus ? 'selected' : ''}}>{{$breed->name}}</option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="birthday" class="form-label">Birthday</label>
            <input type="datetime-local" class="form-control " id="birthday" name="birthday"
                   aria-describedby="birthday">
        </div>

        <div class="mb-3">
            <label for="withdrawn_at" class="form-label">Withdrawn at</label>
            <input type="datetime-local" class="form-control " id="withdrawn_at" name="withdrawn_at"
                   aria-describedby="withdrawn_at">
        </div>

        <div class="mb-3">
            <label for="tag_color" class="form-label">Tag color</label>
            <input type="color" class="form-control  form-control-color" id="tag_color" name="tag_color"
                   aria-describedby="tag_color">
        </div>
    </div>
    <div class="my-1">
        <button type="submit" class="btn btn-outline-primary">Сохранить</button>
    </div>
</form>
