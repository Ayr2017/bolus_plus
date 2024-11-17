@extends('layouts.app')

@section('content')
    <div class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
        <h2>{{$title}}</h2>
    </div>

    <div class="my-4">
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

        <a
            class="btn btn-sm btn-outline-secondary"
            href="{{route('animals.index')}}"
        >
            All animals
        </a>
        <a
            class="btn btn-sm btn-outline-primary"
            href="{{route('animals.edit',['animal' => $animal])}}"
        >
            Edit
        </a>

        @include(
            'layouts.partials.delete-modal',
            [
                'item'=>$animal,
                'message'=>'Animal will delete',
                'route'=>route('animals.destroy', ['animal'=>$animal])
            ]
        )
    </div>
@endsection
