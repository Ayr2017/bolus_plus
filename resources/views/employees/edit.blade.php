@extends('layouts.app')

@section('content')
    <div class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
        <h2>{{$title}}</h2>
        <a class="btn btn-outline-secondary" href="{{route('employees.index')}}">Employees</a>
    </div>

    <div class="my-4">
        @include('employees.partials.employee-edit-form')
        <hr>
        <a
            href="{{route('employees.show',['employee'=>$employee])}}"
            class="btn btn-sm btn-outline-secondary"
        >
            Show
        </a>

        @include(
            'employees.partials.employee-permissions-modal',
            ['permissions_chunk' => $permissions]
        )
    </div>
@endsection
