<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete_modal_{{$item->id}}">
    Delete
</button>

<!-- Modal -->
<div class="modal fade" id="delete_modal_{{$item->id}}" tabindex="-1" aria-labelledby="delete_modal_{{$item->id}}Label"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{$route}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="delete_modal_{{$item->id}}_label">Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{$message}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
