<div class="table-responsive">
    <table class="table table-stripped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Number</th>
            <th>Organisation</th>
            <th>Created at</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($animals as $animal)
        <tr>
            <td>{{$animal->id}}</td>
            <td>
                <a href="{{route('admin.animals.show', ['animal' => $animal])}}">
                    {{$animal->name}}
                </a>
            </td>
            <td>{{$animal->number ?? 'No'}}</td>
            <td>{{$animal->organisation?->name}}</td>
            <td>{{$animal->created_at}}</td>
            <td>
                <a class="btn btn-sm btn-outline-secondary" href="{{route('admin.animals.show', ['animal' => $animal])}}">
                    Редактировать
                </a>
            </td>

        </tr>
        @endforeach
        </tbody>
    </table>
</div>
