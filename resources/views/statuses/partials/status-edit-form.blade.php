<form action="{{route('statuses.update',['status' =>$status])}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name"  name="name" aria-describedby="name" value="{{old('name') ?? $status->name}}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control " id="description"  name="description" aria-describedby="description">{{old('description') ?? $status->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-outline-primary">Update</button>
    <a class="btn btn-outline-secondary" href="{{route('statuses.show',['status' => $status])}}">Отмена</a>
</form>
