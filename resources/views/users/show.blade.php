@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>

    <div class="card">
        <div class="card-header">
            <div class="">
                <a class="btn btn-sm btn-outline-secondary"
                   href="{{route('users.index')}}">Users</a>
            </div>
        </div>
        <div class="card-body">
            <p>Name:{{$user->name}}</p>
            <p>Surname: {{$user->surname}}</p>
            <p>Email: {{$user->email}}</p>
            <p>Phone: {{$user->phone}}</p>
            <p>Created at: {{$user->created_at}}</p>
        </div>
        <div class="card-body border-top">
            <h5>Roles</h5>
            @foreach($user->roles as $role)
                <span
                    class="mx-1 p-1 {{$loop->iteration%2 == 0 ? 'bg-info-subtle' : 'bg-warning-subtle'}}">{{$role->name}}</span>
            @endforeach
        </div>
        <div class="card-footer">
            <a href="{{route('users.edit',['user'=>$user])}}"
               class="btn btn-sm btn-outline-primary">Edit</a>
        </div>
    </div>
@endsection
