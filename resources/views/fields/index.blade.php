@extends('layouts.app')

@section('content')
    <div class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
        <h2>{{$title}}</h2>

        <a
            href="{{route('fields.create')}}"
            class="btn btn-sm btn-outline-primary"
        >
            Create
        </a>
    </div>

    <div class="my-4">
        @include('fields.partials.fields-table')
    </div>
@endsection
