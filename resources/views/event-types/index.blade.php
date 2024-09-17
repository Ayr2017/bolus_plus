@extends('layouts.app')

@section('content')
    <div class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
        <h2>{{$title}}</h2>
        <a
            class="btn btn-sm btn-outline-primary"
            href="{{route('event-types.create')}}"
        >
            Create
        </a>
    </div>


    <div class="my-4">
        @include('event-types.partials.event-types-table')
    </div>
@endsection
