@extends('layouts.app')

@section('content')
    <div class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
        <h2>{{$title}}</h2>
        <button
            type="button"
            class="btn btn-outline-primary"
            data-bs-toggle="modal"
            data-bs-target="#create_permission"
        >
            Create
        </button>
    </div>

    <div class="my-4">
        @include('permissions.partials.permissions-table')
    </div>

    @include('permissions.partials.create-modal')
@endsection
