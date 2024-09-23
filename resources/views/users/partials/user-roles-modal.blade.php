<button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#user_roles_modal">
    Roles
</button>

<!-- Modal -->
<div class="modal fade" id="user_roles_modal" tabindex="-1" aria-labelledby="user_roles_modal_label"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{route('users.update-roles',['user' => $user])}}" method="POST">
                @method('patch')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="user_roles_modal_label">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    @foreach($roles_chunk as $roles)
                        <div class="col-3">
                            <fieldset class="border p-2">
                            @foreach($roles as $role)
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label for="roles_ids_{{$role->id}}">{{$role->name}} </label>
                                        <input type="checkbox" name="roles_names[]" value="{{$role->name}}" id="roles_names{{$role->id}}" {{$user->hasRole($role->name) ? 'checked' : ''}}>
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
