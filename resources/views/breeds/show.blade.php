@extends('layouts.app')

@section('content')
    <div class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
        <h2>{{$title}}</h2>
        <a
            class="btn btn-outline-primary"
            href="{{route('breeds.index')}}"
        >
            All breeds
        </a>
        <a
            class="btn btn-outline-primary"
            href="{{route('breeds.edit',['breed' => $breed])}}"
        >
            Edit
        </a>
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
                    <td>{{$breed->id}}</td>
                </tr>
                <tr>
                    <th>UUID</th>
                    <td>{{$breed->uuid}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$breed->name}}</td>
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>{{$breed->created_at}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    @include(
        'layouts.partials.delete-modal',
        [
            'item'=>$breed,
            'message' =>null,
            'route' => route('breeds.destroy',['breed' => $breed])
        ]
    )
@endsection
