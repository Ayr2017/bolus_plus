<!-- Modal -->
<div class="modal fade" id="create_permission" tabindex="-1" aria-labelledby="create_permission_Label"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" >
            <form action="{{route('permissions.store')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="create_permission_Label">Create new permission</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="my-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="guard_name">Guard name</label>
                            <input type="text" name="guard_name" id="guard_name" class="form-control" value="web">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
