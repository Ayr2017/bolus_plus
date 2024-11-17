<form action="{{route('event-types.update',['event_type' => $event_type])}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="name" class="form-label">Название</label>
        <input type="text" class="form-control form-control-sm" id="name"  name="name" aria-describedby="name" value="{{$event_type->name ?? old('name')}}">
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control form-control-sm" id="slug"  name="slug" aria-describedby="slug" value="{{$event_type->slug ?? old('slug')}}">
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Description</label>
        <textarea class="form-control form-control-sm" id="description"  name="description" aria-describedby="description">{{$event_type->description ?? old('description')}}</textarea>
    </div>
    <div class="mb-3">
        <label for="icon" class="form-label">Icon</label>
        <input type="text" class="form-control form-control-sm" id="icon"  name="icon" aria-describedby="slug" value="{{$event_type->icon ?? old('icon')}}">
    </div>
    <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
</form>
