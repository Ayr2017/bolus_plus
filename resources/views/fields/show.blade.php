@extends('layouts.app')

@section('content')
    <div class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
        <h2>{{$title}}</h2>
        <a
            class="btn btn-sm btn-outline-primary"
            href="{{route('fields.index')}}"
        >
            All fields
        </a>
        <a
            class="btn btn-sm btn-outline-primary"
            href="{{route('fields.edit',['field' => $field])}}"
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
                <td>{{$field->id}}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{$field->title}}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{$field->name}}</td>
            </tr>
            <tr>
                <th>Slug</th>
                <td>{{$field->name}}</td>
            </tr>
            <tr>
                <th>Order</th>
                <td>{{$field->order}}</td>
            </tr>
            <tr>
                <th>Event type</th>
                <td>{{$field->eventType->name}}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{$field->description}}</td>
            </tr>
            <tr>
                <th>Options</th>
                <td>{{$field->options}}</td>
            </tr>
            <tr>
                <th>Created at</th>
                <td>{{$field->created_at}}</td>
            </tr>
            </tbody>
        </table>
    </div>

    @include(
        'layouts.partials.delete-modal',
        [
            'item'=>$field,
            'message' =>null,
            'route' => route('fields.destroy',['field' => $field])
        ]
    )
@endsection
