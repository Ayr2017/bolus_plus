<form action="{{route('organisations.update',['organisation' => $organisation])}}" method="POST" class="row">
    @csrf
    @method('PATCH')
    <div class="col-6">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control form-control-sm" id="name" value="{{old('name') ?? $organisation->name }}" name="name" aria-describedby="name">
        </div>
        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent</label>
            <select class="form-select form-select-sm" name="parent_id" id="parent_id">
                <option value=""></option>
                @foreach($parents as $parent)
                    <option value="{{$parent->id}}" {{$parent->id == (old('parent_id') ?? $organisation->parent_id) ? 'selected' : ''}}>{{$parent->id." - ".$parent->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="structural_unit_id" class="form-label">Structural unit</label>
            <select class="form-select form-select-sm" name="structural_unit_id" id="structural_unit_id">
                <option value=""></option>
                @foreach($structural_units as $unit)
                    <option value="{{$unit->id}}" {{$unit->id == (old('structural_unit_id') ?? $organisation->structural_unit_id) ? 'selected' : ''}}>{{$unit->id." - ".$unit->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="my-1 border-top pt-2 border-2">
        <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
        <a href="{{route('organisations.show',['organisation' => $organisation])}}" class="btn btn-outline-secondary btn-sm">Show</a>
    </div>
</form>
