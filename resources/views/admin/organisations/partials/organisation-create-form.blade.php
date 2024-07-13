<form action="{{route('admin.employees.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Название</label>
        <input type="text" class="form-control" id="name"  name="name" aria-describedby="name">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Структурное название</label>
        <input type="text" class="form-control" id="structural_unit_name"  name="structural_unit_name" aria-describedby="structural_unit_name">
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
