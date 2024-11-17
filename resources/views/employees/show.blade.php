@extends('layouts.app')

@section('content')
    <div class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
        <h2>{{$title}}</h2>
        <a class="btn btn-outline-secondary" href="{{route('employees.index')}}">Employees</a>
    </div>

    <div class="my-4">
        <p>Organisation:{{$employee->organisation->name}}</p>
        <p>Position: {{$employee->position}}</p>
        <p>User: {{$employee->user->fullName}}</p>
        <p>Created at: {{$employee->created_at}}</p>

        <div class="hr"></div>

        <h5>Permissions</h5>
        @foreach($employee->permissions as $permission)
            <span
                class="mx-1 p-1 {{
                    $loop->iteration % 2 == 0
                    ? 'bg-info-subtle'
                    : 'bg-warning-subtle'
                }}"
            >
                {{$permission->name}}
            </span>
        @endforeach

        <a
            href="{{route('employees.edit',['employee'=>$employee])}}"
            class="btn btn-outline-primary"
        >
            Edit
        </a>
    </div>
@endsection
