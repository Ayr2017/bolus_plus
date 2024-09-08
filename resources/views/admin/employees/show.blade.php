@extends('layouts.admin')

@section('content')
    <h1>{{$title}}</h1>

    <div class="card">
        <div class="card-header">
            <div class="">
                <a class="btn btn-sm btn-outline-secondary" href="{{route('admin.employees.index')}}">Employees</a>

            </div>
        </div>
        <div class="card-body">
            <p>Organisation:{{$employee->organisation->name}}</p>
            <p>Position: {{$employee->position}}</p>
            <p>User: {{$employee->user->fullName}}</p>
            <p>Created at: {{$employee->created_at}}</p>
        </div>
        <div class="card-footer">
            @include('admin.employees.partials.employee-edit')
        </div>
    </div>
@endsection
