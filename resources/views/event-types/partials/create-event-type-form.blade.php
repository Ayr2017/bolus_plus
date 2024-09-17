<form action="{{route('event-types.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Название</label>
        <input type="text" class="form-control form-control-sm" id="name"  name="name" aria-describedby="name" {{old('name')}}>
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control form-control-sm" id="slug"  name="slug" aria-describedby="slug" value="{{old('slug')}}">
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Description</label>
        <textarea class="form-control form-control-sm" id="slug"  name="slug" aria-describedby="slug">{{old('description')}}</textarea>
    </div>
    <div class="mb-3">
        <label for="icon" class="form-label">Icon</label>
        <input type="text" class="form-control form-control-sm" id="icon"  name="icon" aria-describedby="slug" value="{{old('icon')}}">
    </div>
    <button type="submit" class="btn btn-outline-primary">Сохранить</button>
</form>
