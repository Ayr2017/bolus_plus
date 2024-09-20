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
        <label for="title" class="form-label">Event type</label>
        <select class="form-select form-select-sm" id="event_type" name="event_type_id"
               aria-describedby="type">
            @foreach($event_types as $event_type)
                <option value="{{$event_type->id}}">{{$event_type->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Type</label>
        <select class="form-select form-select-sm" id="type" name="type"
               aria-describedby="type">
                <option value="text">text</option>
                <option value="textarea">textarea</option>
                <option value="datetime-local">datetime-local</option>
                <option value="number">number</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="order" class="form-label">Order</label>
        <input min="0" type="number" class="form-control form-control-sm" id="order" name="order"
               aria-describedby="order" value="{{old('order')}}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control form-control-sm" id="description" name="description"
               aria-describedby="description" value="{{old('description')}}">
    </div>
    <div class="mb-3">
        <label for="options" class="form-label">Options</label>
        <input type="text" class="form-control form-control-sm" id="options" name="options"
               aria-describedby="options" value="{{old('options')}}">
    </div>
    <div class="mb-3">
        <label for="rule_store" class="form-label">Rules for store (string)</label>
        <textarea class="form-control form-control-sm" id="rule_store" name="rule_store"
                  aria-describedby="rule_store" >{{old('rule_store')}}</textarea>
    </div>
    <div class="mb-3">
        <label for="rule_update" class="form-label">Rules for update (string)</label>
        <textarea class="form-control form-control-sm" id="rule_update" name="rule_update"
                  aria-describedby="rule_update" >{{old('rule_update')}}</textarea>
    </div>
    <div class="my-1 border-top pt-2 border-2">
        <a href="{{route('fields.index')}}" class="btn btn-sm  btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-sm btn-outline-primary">Save</button>
    </div>
</form>
