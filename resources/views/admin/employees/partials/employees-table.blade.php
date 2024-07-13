<div class="table-responsive">
    <table class="table table-stripped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Organisation</th>
            <th>User</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->organisation?->name}}</td>
            <td>{{$employee->user->name}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
