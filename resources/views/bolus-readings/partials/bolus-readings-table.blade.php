<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm">
        <thead>
        <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Bolus</th>
            <th>Animal</th>
            <th>RSSI</th>
            <th>AmM</th>
            <th>CmM</th>
            <th>VB</th>
            <th>AdX</th>
            <th>AdY</th>
            <th>AdZ</th>
            <th>CdX</th>
            <th>CdY</th>
            <th>CdZ</th>
            <th>PH</th>
            <th>PN</th>
            <th class="bg-info-subtle">UT</th>
            <th>Created at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bolus_readings as $bolus_reading)
            <tr>
                <td>
                    <a href="{{route('bolus-readings.show',['bolus_reading' => $bolus_reading])}}">
                        {{$bolus_reading->id}}
                    </a>
                </td>
                <td>{{$bolus_reading->date}}</td>
                <td>
                    <a href="{{route('boluses.show',['bolus'=>$bolus_reading->bolus])}}">
                        bolus
                    </a>
                </td>
                <td>
                    <a href="{{route('animals.show',['animal'=>$bolus_reading->animal])}}">
                        animal
                    </a>
                </td>
                <td>{{$bolus_reading->rssi}}</td>
                <td>{{$bolus_reading->amm}}</td>
                <td>{{$bolus_reading->cmm}}</td>
                <td>{{$bolus_reading->vb}}</td>
                <td>{{$bolus_reading->adx}}</td>
                <td>{{$bolus_reading->ady}}</td>
                <td>{{$bolus_reading->adz}}</td>
                <td>{{$bolus_reading->cdx}}</td>
                <td>{{$bolus_reading->cdy}}</td>
                <td>{{$bolus_reading->cdz}}</td>
                <td>{{$bolus_reading->ph}}</td>
                <td>{{$bolus_reading->pn}}</td>
                <td class="bg-info-subtle">{{$bolus_reading->ut}}</td>
                <td>{{$bolus_reading->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
