<form action="{{route('admin.employees.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="position" class="form-label">Должность</label>
        <input type="text" class="form-control" id="position"  name="position" aria-describedby="position">
    </div>
    <div class="mb-3">
        <label for="user_id" class="form-label">Пользователь</label>
        <select class="form-select" aria-label="Пример выбора по умолчанию" id="user_id" name="user_id">
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="organisation_id" class="form-label">Организация</label>
        <select class="form-select" aria-label="Пример выбора по умолчанию" id="organisation_id" name="organisation_id">
            @foreach($organisations as $organisation)
                <option value="{{$organisation->id}}">{{$organisation->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-outline-primary">Сохранить</button>
</form>
