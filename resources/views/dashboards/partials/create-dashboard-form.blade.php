<form action="{{route('dashboards.store')}}" method="POST" class="row">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name"  name="name" aria-describedby="name">
    </div>
    <div class="my-1 border-top pt-2 border-2">
        <a href="{{route('events.index')}}" class="btn btn-sm btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-sm btn-outline-primary">Save</button>
    </div>
</form>
