<div class="table-responsive">
    <table class="table table-stripped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Name</th>
            <th>Type</th>
            <th>Order</th>
            <th>Description</th>
            <th>Created at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fields as $field)
            <tr>
                <td>{{$field->id}}</td>
                <td>
                    <a href="{{route('fields.show',[$field])}}">{{$field->title}}</a></td>
                <td>{{$field->name}}</td>
                <td>
                    <a href="{{route('fields.show', ['field' => $field])}}">
                        {{$field->eventType->name}}
                    </a>
                </td>
                <td>{{$field->order}}</td>
                <td>{{$field->description}}</td>
                <td>{{$field->created_at}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
