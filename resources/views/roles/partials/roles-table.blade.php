<div class="table-responsive">
    <table class="table">
        @if($roles->count())
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Guard name</th>
                    <th></th>
                </tr>
            </thead>
        @endisset
        <tbody>
            @forelse($roles as $role)
                <tr>
                    <td>
                        <a href="{{route('roles.show',['role' => $role])}}">
                            {{$role->id}}
                        </a>
                    </td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->guard_name}}</td>
                    <td>
                        <form action="{{route('roles.destroy',['role' => $role])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <h3>
                    No data
                </h3>
            @endforelse
        </tbody>
    </table>
</div>
