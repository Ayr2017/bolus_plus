<form action="{{route('organisations.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Название</label>
        <input type="text" class="form-control" id="name"  name="name" aria-describedby="name">
    </div>
    <div class="mb-3">
        <label for="structural_unit_id" class="form-label">Структурное название</label>
        <select class="form-select" aria-label="Пример выбора по умолчанию" id="structural_unit_id" name="structural_unit_id">
            @foreach($structural_units as $structural_unit)
                <option value="{{$structural_unit->id}}">{{$structural_unit->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="organisation_id" class="form-label">Родительская организация</label>
        <select class="form-select" aria-label="Пример выбора по умолчанию" id="parent_id" name="parent_id">
            @foreach($organisations as $organisation)
                <option value="{{$organisation->id}}">{{$organisation->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-outline-primary btn-sm">Сохранить</button>
</form>
