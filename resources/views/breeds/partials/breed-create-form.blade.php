<form action="{{route('breeds.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Название</label>
        <input type="text" class="form-control" id="name"  name="name" aria-describedby="name">
    </div>
    <button type="submit" class="btn btn-outline-primary">Сохранить</button>
</form>
