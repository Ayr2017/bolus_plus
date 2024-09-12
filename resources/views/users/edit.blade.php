@extends('layouts.admin')

@section('content')
    <h1>{{$title}}</h1>

    <div class="card">
        <div class="card-header">
            <div class="">
                <a class="btn btn-sm btn-outline-secondary" href="{{route('users.index')}}">Employees</a>
                <a href="{{route('users.show',['user'=>$user])}}"
                   class="btn btn-sm btn-outline-secondary">Show</a>
                @include('users.partials.user-roles-modal', ['roles_chunk' => $roles])
            </div>
        </div>
        <div class="card-body">
            @include('users.partials.user-edit-form')
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection
