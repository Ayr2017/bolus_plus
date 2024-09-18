@extends('layouts.app')

@section('content')
    <div class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
        <h2>{{$title}}</h2>
        <div>
            <a
                class="btn btn-sm btn-outline-secondary"
                href="{{route('event-types.index')}}"
            >
                All event types
            </a>
            <a
                class="btn btn-sm btn-outline-primary"
                href="{{route('event-types.edit',['event_type' => $event_type])}}"
            >
                Edit
            </a>
        </div>

    </div>

    <div class="my-4">
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>Id</th>
                <td>{{$event_type->id}}</td>
            </tr>
            <tr>
                <th>Slug</th>
                <td>{{$event_type->slug}}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{$event_type->name}}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{$event_type->description}}</td>
            </tr>
            <tr>
                <th>Icon</th>
                <td>{!! $event_type->icon !!}</td>
            </tr>
            <tr>
                <th>Created at</th>
                <td>{{$event_type->created_at}}</td>
            </tr>
            </tbody>
        </table>
    </div>

    @include(
        'layouts.partials.delete-modal',
        [
            'item'=>$event_type,
            'message' =>null,
            'route' => route('event-types.destroy',['event_type' => $event_type])
        ]
    )
@endsection
