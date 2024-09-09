<div class="table-responsive">
    <table class="table table-stripped table-bordered table-sm">
        <thead>
        <tr>
            <th>Id</th>
            <th>Organisation</th>
            <th>Position</th>
            <th>User</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>
                <a href="{{route('admin.employees.show',['employee' => $employee])}}">
                    {{$employee->id}}
                </a>
            </td>
            <td>{{$employee->organisation?->name}}</td>
            <td>{{$employee->position}}</td>
            <td>{{$employee->user->name}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
