<form action="{{route('statuses.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control " id="name"  name="name" aria-describedby="name" value="{{old('name')}}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control " id="description"  name="description" aria-describedby="description">{{old('description')}}</textarea>
    </div>
    <button type="submit" class="btn btn-outline-primary">Сохранить</button>
</form>
