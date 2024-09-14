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
                    {{$breed->id}}
                </td>
                <td>
                    <a href="{{route('breeds.show',['breed' => $breed])}}">
                        {{$breed->name}}
                    </a>
                </td>
                <td>{{$breed->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
