<div class="table-responsive">
    <table class="table table-stripped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Number</th>
            <th>Organisation</th>
            <th>Created at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($animals as $animal)
        <tr>
            <td>{{$animal->id}}</td>
            <td>{{$animal->name}}</td>
            <td>{{$animal->number ?? 'No'}}</td>
            <td>{{$animal->organisation?->name}}</td>
            <td>{{$animal->created_at}}</td>

        </tr>
        @endforeach
        </tbody>
    </table>
</div>
