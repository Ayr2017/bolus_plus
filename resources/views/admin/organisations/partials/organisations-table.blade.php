<div class="table-responsive">
    <table class="table table-stripped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Organisation</th>
            <th>Parent</th>
            <th>User</th>
        </tr>
        </thead>
        <tbody>
        @foreach($organisations as $organisation)
        <tr>
            <td>{{$organisation->id}}</td>
            <td>{{$organisation->name}}</td>
            <td>{{$organisation->parent?->name}}</td>
            <td>{{$employee->structural_unit_name}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
