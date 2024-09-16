@extends('layouts.app')

@section('content')
    <div class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
        <h2>{{$title}}</h2>

        <div class="d-flex gap-1">
            <a
                class="btn btn-outline-secondary"
                href="{{route('users.index')}}"
            >
                Employees
            </a>
            <a
                href="{{route('users.show',['user'=>$user])}}"
                class="btn btn-outline-secondary"
            >
                Show
            </a>

            @include('users.partials.user-roles-modal', ['roles_chunk' => $roles])
        </div>
    </div>

    <div class="my-4">
        @include('users.partials.user-edit-form')
    </div>
@endsection
