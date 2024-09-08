


<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#edit_employee">
    Edit
</button>

<!-- Modal -->
<div class="modal fade" id="edit_employee" tabindex="-1" aria-labelledby="edit_employee_Label" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <form action="{{route('admin.employees.update',['employee'=>$employee])}}" method="POST">
                @csrf
                @method('PATCH')
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="edit_employee_Label">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                    <div class="mb-3">
                        <label for="position" class="form-label">Должность</label>
                        <input type="text" class="form-control" id="position"  name="position" aria-describedby="position" value="{{old('position') ?? $employee->position}}">
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Пользователь</label>
                        <select class="form-select" aria-label="Пример выбора по умолчанию" id="user_id" name="user_id">
                            @foreach($users as $user)
                                <option value="{{$user->id}}" {{(old('user_id') ?? $employee->user_id) == $user->id ?'selected': ''}}>{{$user->name}}</option>
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
                    <button type="submit" class="btn btn-outline-primary btn-sm">Сохранить</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </form>

        </div>
    </div>
</div>
