<div class="table-responsive">
    <table class="table table-stripped table-bordered table-sm">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($breeds as $breed)
            <tr>
                <td>
                    <a href="{{route('breeds.show',['breed' => $breed])}}">
                        {{$breed->id}}
                    </a>
                </td>
                <td>{{$breed->name}}</td>
                <td>{{$breed->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
