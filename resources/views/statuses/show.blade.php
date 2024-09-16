@extends('layouts.app')

@section('content')
    <div class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
        <h2>{{$title}}</h2>

        <a
            class="btn btn-outline-secondary"
            href="{{route('statuses.index')}}"
        >
            All statuses
        </a>
        <a
            class="btn btn-outline-primary"
            href="{{route('statuses.edit',['status' => $status])}}"
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
                    <td>{{$status->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$status->name}}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{$status->description}}</td>
                </tr>
                <tr>
                    <th>Slug</th>
                    <td>{{$status->slug}}</td>
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>{{$status->created_at}}</td>
                </tr>
            </tbody>
        </table>

        @include(
            'layouts.partials.delete-modal',
            [
                'item' => $status,
                'message' => 'Status will delete',
                'route' => route('statuses.destroy', ['status' => $status])
            ]
        )
    </div>
@endsection
