@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <div class="">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-sm btn-outline-secondary" href="{{route('boluses.index')}}">All
                        boluses</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>Id</th>
                            <td>{{$bolus->id}}</td>
                        </tr>
                        <tr>
                            <th>Number</th>
                            <td>{{$bolus->number}}</td>
                        </tr>
                        <tr>
                            <th>Version</th>
                            <td>{{$bolus->version}}</td>
                        </tr>
                        <tr>
                            <th>Batch number</th>
                            <td>{{$bolus->batch_number}}</td>
                        </tr>
                        <tr>
                            <th>Produced at</th>
                            <td>{{$bolus->produced_at}}</td>
                        </tr>
                        <tr>
                            <th>Created at</th>
                            <td>{{$bolus->created_at}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sm btn-outline-primary"
                       href="{{route('boluses.edit',['bolus' => $bolus])}}">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
