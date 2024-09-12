<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#create_role">
    Create
</button>

<!-- Modal -->
<div class="modal fade" id="create_role" tabindex="-1" aria-labelledby="create_role_Label"
     aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" >
            <form action="{{route('roles.store')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="create_role_Label">Create new role</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                    <div class="col-4"></div>
                    <div class="col-4">
                            <div class="my-3">
                                <label for="">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="my-3">
                                <label for="">Guard name</label>
                                <input type="text" name="guard_name" id="guard_name" class="form-control" value="web">
                            </div>
                        <div class="col-4"></div>
                    </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
