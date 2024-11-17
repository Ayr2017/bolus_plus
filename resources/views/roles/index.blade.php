@extends('layouts.app')

@section('content')
    <div class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
        <h2>{{$title}}</h2>
        <button
            type="button"
            class="btn btn-outline-primary"
            data-bs-toggle="modal"
            data-bs-target="#create_role"
        >
            Create
        </button>
    </div>

    <div class="my-4">
        @include('roles.partials.roles-table')
    </div>

    @include('roles.partials.create-modal')
@endsection
