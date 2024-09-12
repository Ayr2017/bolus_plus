@extends('layouts.admin')

@section('content')
    <h1>{{$title}}</h1>

    <div class="card">
        <div class="card-header">
            <div class="">
                <a class="btn btn-sm btn-outline-secondary" href="{{route('admin.roles.index')}}">Roles</a>
            </div>
        </div>
        <div class="card-body">
            <p>Name:{{$role->name}}</p>
            <p>Guard: {{$role->guard_name}}</p>
        </div>
        <div class="card-body border-top">
            <h5>Permissions</h5>
            @foreach($role->permissions as $permission)
                <span class="mx-1 p-1 {{$loop->iteration%2 == 0 ? 'bg-info-subtle' : 'bg-warning-subtle'}}">{{$permission->name}}</span>
            @endforeach
        </div>
        <div class="card-footer">
            <a href="{{route('admin.roles.edit',['role'=>$role])}}" class="btn btn-sm btn-outline-primary">Edit</a>
        </div>
    </div>
@endsection
