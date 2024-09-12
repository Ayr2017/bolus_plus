<div class="table-responsive">
    <table class="table table-stripped table-bordered table-sm">
        @if($permissions->count())
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
        @forelse($permissions as $permission)
            <tr>
                <td>
                    <a href="{{route('permissions.show',['permission' => $permission])}}">
                        {{$permission->id}}
                    </a>
                </td>
                <td>{{$permission->name}}</td>
                <td>{{$permission->guard_name}}</td>
                <td>
                    <form action="{{route('permissions.destroy',['permission' => $permission])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger">
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
