<div class="table-responsive">
    <table class="table table-stripped table-bordered table-sm">
        <thead>
        <tr>
            <th>Id</th>
            <th>Number</th>
            <th>Version</th>
            <th>Batch number</th>
            <th>Produced at</th>
            <th>Created at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($boluses as $bolus)
            <tr>
                <td>
                    <a href="{{route('boluses.show',['bolus' => $bolus])}}">
                        {{$bolus->id}}
                    </a>
                </td>
                <td>{{$bolus->number}}</td>
                <td>{{$bolus->version}}</td>
                <td>{{$bolus->batch_number}}</td>
                <td>{{$bolus->produced_at}}</td>
                <td>{{$bolus->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
