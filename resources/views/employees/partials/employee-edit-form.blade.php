    <form action="{{route('employees.update',['employee'=>$employee])}}" method="POST">
        @csrf
        @method('PATCH')
            <div class="mb-3">
                <label for="position" class="form-label">Должность</label>
                <input type="text" class="form-control" id="position" name="position" aria-describedby="position"
                       value="{{old('position') ?? $employee->position}}">
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">Пользователь</label>
                <select class="form-select" aria-label="Пример выбора по умолчанию" id="user_id" name="user_id">
                    <option value=""></option>
                    @foreach($users as $user)
                        <option
                            value="{{$user->id}}" {{(old('user_id') ?? $employee->user_id) == $user->id ?'selected': ''}}>{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="organisation_id" class="form-label">Организация</label>
                <select class="form-select" aria-label="Пример выбора по умолчанию" id="organisation_id"
                        name="organisation_id">
                    <option value=""></option>
                    @foreach($organisations as $organisation)
                        <option value="{{$organisation->id}}" {{(old('organisation_id') ?? $employee->organisation_id) == $organisation->id ?'selected': ''}}>{{$organisation->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-sm">Сохранить</button>
    </form>
