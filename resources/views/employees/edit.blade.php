@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>

    <div class="card">
        <div class="card-header">
            <div class="">
                <a class="btn btn-sm btn-outline-secondary" href="{{route('employees.index')}}">Employees</a>
                <a href="{{route('employees.show',['employee'=>$employee])}}"
                   class="btn btn-sm btn-outline-secondary">Show</a>
                @include('employees.partials.employee-permissions-modal', ['permissions_chunk' => $permissions])
            </div>
        </div>
        <div class="card-body">
            @include('employees.partials.employee-edit-form')
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection
