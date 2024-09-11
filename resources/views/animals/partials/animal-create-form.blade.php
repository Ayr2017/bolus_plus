<form action="{{route('animals.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Название</label>
        <input type="text" class="form-control" id="name"  name="name" aria-describedby="name">
    </div>
    <div class="mb-3">
        <label for="number" class="form-label">Номер</label>
        <input type="text" class="form-control" id="number"  name="number" aria-describedby="number">
    </div>

    <div class="mb-3">
        <label for="organisation_id" class="form-label">Организация</label>
        <select class="form-select" aria-label="Пример выбора по умолчанию" id="organisation_id" name="organisation_id">
            @foreach($organisations as $organisation)
                <option value="{{$organisation->id}}">{{$organisation->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-outline-primary btn-sm">Сохранить</button>
</form>
