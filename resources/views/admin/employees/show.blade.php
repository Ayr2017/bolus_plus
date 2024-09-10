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
        <div class="card-body border-top">
            <h5>Permissions</h5>
            @foreach($employee->permissions as $permission)
                <span class="mx-1 p-1 {{$loop->iteration%2 == 0 ? 'bg-info-subtle' : 'bg-warning-subtle'}}">{{$permission->name}}</span>
            @endforeach
        </div>
        <div class="card-footer">
            <a href="{{route('admin.employees.edit',['employee'=>$employee])}}" class="btn btn-sm btn-outline-primary">Edit</a>
        </div>
    </div>
@endsection
