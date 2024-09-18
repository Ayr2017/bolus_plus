<div class="table-responsive">
    <table class="table table-stripped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Type</th>
            <th>Number</th>
            <th>Description</th>
            <th>Created at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fields as $field)
            <tr>
                <td>{{$field->id}}</td>
                <td>
                    <a href="{{route('fields.show', ['field' => $field])}}">
                        {{$field->event_type}}
                    </a>
                </td>
                <td>{{$field->name}}</td>
                <td>{{$field->type}}</td>
                <td>{{$field->number}}</td>
                <td>{{$field->description}}</td>
                <td>{{$field->created_at}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
