<form action="{{route('fields.update',['field'=>$field])}}" method="POST" class="row">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control form-control-sm" id="name" name="name"
               aria-describedby="name" value="{{old('name') ?? $field->name}}">
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control form-control-sm" id="title" name="title"
               aria-describedby="title" value="{{old('title') ?? $field->title}}">
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Event type</label>
        <select class="form-select form-select-sm" id="event_type" name="event_type_id"
               aria-describedby="type">
            @foreach($event_types as $event_type)
                <option value="{{$event_type->id}}"
                    {{(old('event_type_id') ?? $field->event_type_id) == $event_type->id ? 'selected' : '' }}>
                    {{$event_type->name}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Type</label>
        <select class="form-select form-select-sm" id="type" name="type"
               aria-describedby="type">
            @foreach($field_type_enum as $type)
                <option value="{{$type}}" {{(old('type') ?? $field->type) == $type->value ? 'selected' : ''}}>{{$type}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="number" class="form-label">Number</label>
        <input min="0" type="number" class="form-control form-control-sm" id="number" name="number"
               aria-describedby="number" value="{{(old('number') ?? $field->number)}}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control form-control-sm" id="description" name="description"
               aria-describedby="description" value="{{old('description') ?? $field->description}}">
    </div>
    <div class="mb-3">
        <label for="options" class="form-label">Options</label>
        <input type="text" class="form-control form-control-sm" id="options" name="options"
               aria-describedby="options" value="{{old('options') ?? $field->options}}">
    </div>
    <div class="my-1 border-top pt-2 border-2">
        <a href="{{route('fields.index')}}" class="btn btn-sm  btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-sm btn-outline-primary">Save</button>
    </div>
</form>
