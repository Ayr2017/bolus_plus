<form action="{{route('breeds.update',['breed' =>$breed])}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="name" class="form-label">Название</label>
        <input type="text" class="form-control" id="name"  name="name" aria-describedby="name" value="{{old('name') ?? $breed->name}}">
    </div>
    <button type="submit" class="btn btn-outline-primary btn-sm">Обновить</button>
    <a class="btn btn-sm btn-outline-secondary" href="{{route('breeds.show',['breed' => $breed])}}">Отмена</a>
</form>
