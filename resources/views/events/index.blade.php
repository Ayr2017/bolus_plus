@extends('layouts.app')

@section('content')
    <div class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
        <h2>{{$title}}</h2>

        <button
            type="button"
            class="btn btn-sm btn-outline-primary"
            data-bs-toggle="modal"
            data-bs-target="#select_create_event_modal"
        >
            Create
        </button>
    </div>

    <div class="my-4">
        @include('events.partials.events-table')
    </div>

    @include('events.partials.select-create-event-type-modal')
@endsection
