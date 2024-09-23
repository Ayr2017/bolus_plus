<form action="{{route('dashboards.store')}}" method="POST" class="row">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name"  name="name" aria-describedby="name" value="{{old('name')}}">
    </div>
    <div class="mb-3">
        <label for="icon" class="form-label">Icon</label>
        <input type="text" class="form-control" id="icon"  name="icon" aria-describedby="icon" value="{{old('icon')}}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control-sm form-control" id="description"  name="description" aria-describedby="description">{{old('description')}}</textarea>
    </div>
    <div class="mb-3">
        <label for="icon" class="form-label">Picture</label>
        <input type="file" class="form-control" id="picture"  name="picture" aria-describedby="picture" value="{{old('picture')}}">
    </div>
    <div class="my-1 border-top pt-2 border-2">
        <a href="{{route('events.index')}}" class="btn btn-sm btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-sm btn-outline-primary">Save</button>
    </div>
</form>
