<button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#employee_permissions_modal">
    Permissions
</button>

<!-- Modal -->
<div class="modal fade" id="employee_permissions_modal" tabindex="-1" aria-labelledby="employee_permissions_modal_label"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{route('employees.permissions.update',['employee' => $employee])}}" method="POST">
                @method('patch')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="employee_permissions_modal_label">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    @foreach($permissions_chunk as $permissions)
                        <div class="col-3">
                            <fieldset class="border p-2">
                            @foreach($permissions as $permission)
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label for="permissions_ids_{{$permission->id}}">{{$permission->name}}</label>
                                        <input type="checkbox" name="permissions_names[]" value="{{$permission->name}}" id="permissions_names{{$permission->id}}" {{$employee->hasAnyPermission($permission->name) ? 'checked' : ''}}>
                                    </div>
                                </div>
                            @endforeach
                            </fieldset>
                        </div>
                    @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-sm btn-outline-primary">Обновить</button>
                </div>
            </form>
        </div>
    </div>
</div>
