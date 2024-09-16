<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Organisation</th>
                <th>Parent</th>
                <th>Unit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($organisations as $organisation)
                <tr>
                    <td>{{$organisation->id}}</td>
                    <td>
                        <a href="{{route('organisations.show',['organisation' => $organisation])}}">{{$organisation->name}}</a>
                    </td>
                    <td>{{$organisation->parent?->name ?? 'No'}}</td>
                    <td>{{$organisation->structuralUnit?->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
