<div class="table-responsive">
    <table class="table table-stripped table-bordered table-sm">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Created at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($statuses as $status)
            <tr>
                <td>
                    <a href="{{route('statuses.show',['status' => $status])}}">
                        {{$status->id}}
                    </a>
                </td>
                <td>{{$status->name}}</td>
                <td>{{$status->slug}}</td>
                <td>{{$status->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
