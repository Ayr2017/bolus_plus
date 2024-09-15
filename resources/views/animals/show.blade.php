@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <div class="">
        <div class="col-6">
            <div class="card ">
                <div class="card-header">
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
                            <td>{{$animal->id}}</td>
                        </tr>
                        <tr>
                            <th>Number</th>
                            <td>{{$animal->number}}</td>
                        </tr>
                        <tr>
                            <th>Birthday</th>
                            <td>{{$animal->birthday_ymd}}</td>
                        </tr>
                        <tr>
                            <th>Breed</th>
                            <td>{{$animal->breed->name}}</td>
                        </tr>
                        <tr>
                            <th>Number RSHN</th>
                            <td>{{$animal->number_rshn}}</td>
                        </tr>
                        <tr>
                            <th>Number RF</th>
                            <td>{{$animal->number_rf}}</td>
                        </tr>
                        <tr>
                            <th>Number tavro</th>
                            <td>{{$animal->number_tavro}}</td>
                        </tr>
                        <tr>
                            <th>Number tag</th>
                            <td>{{$animal->number_tag}}</td>
                        </tr>
                        <tr>
                            <th>Number collar</th>
                            <td>{{$animal->collar}}</td>
                        </tr>
                        <tr>
                            <th>Tag color</th>
                            <td>{{$animal->tag_color}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$animal->status->name}}</td>
                        </tr>
                        <tr>
                            <th>Sex</th>
                            <td>{{$animal->sex}}</td>
                        </tr>
                        <tr>
                            <th>Bolus</th>
                            <td>{{$animal->bolus->number}}</td>
                        </tr>
                        <tr>
                            <th>Organisation</th>
                            <td>
                                <a href="{{route('organisations.show',['organisation' => $animal->organisation])}}">{{$animal->organisation->name}}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Created at</th>
                            <td>{{$animal->created_at}}</td>
                        </tr>
                        <tr>
                            <th>Withdrawn at</th>
                            <td>{{$animal->withdrawn_at}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sm btn-outline-secondary" href="{{route('animals.index')}}">All
                        animals</a>
                    <a class="btn btn-sm btn-outline-primary"
                       href="{{route('animals.edit',['animal' => $animal])}}">Edit</a>
                    @include('layouts.partials.delete-modal',['item'=>$animal, 'message'=>'Animal will delete','route'=>route('animals.destroy',['animal'=>$animal])])
                </div>
            </div>
        </div>
    </div>
@endsection
