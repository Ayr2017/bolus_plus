<form action="{{route('fields.store')}}" method="POST" class="row">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control form-control-sm" id="name" name="name"
               aria-describedby="name" value="{{old('name')}}">
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control form-control-sm" id="title" name="title"
               aria-describedby="title" value="{{old('title')}}">
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Type</label>
        <select class="form-select form-select-sm" id="type" name="event_type_id"
               aria-describedby="type">
            @foreach($event_types as $event_type)
                <option value="{{$event_type->id}}">{{$event_type->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="number" class="form-label">Number</label>
        <input min="0" type="number" class="form-control form-control-sm" id="number" name="number"
               aria-describedby="number" value="{{old('number')}}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control form-control-sm" id="description" name="description"
               aria-describedby="description" value="{{old('description')}}">
    </div>
    <div class="my-1 border-top pt-2 border-2">
        <a href="{{route('fields.index')}}" class="btn btn-sm  btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-sm btn-outline-primary">Save</button>
    </div>
</form>
