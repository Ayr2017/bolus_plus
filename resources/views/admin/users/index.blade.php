@extends('layouts.admin')

@section('content')
    <h1>{{$title}}</h1>

    <div class="card">
        <div class="card-header">
            <div class="">
                <a class="btn btn-sm btn-outline-primary" href="{{route('admin.users.create')}}">Create</a>
            </div>
        </div>
        <div class="card-body">
            @include('admin.users.partials.users-table')
        </div>
        <div class="card-footer"></div>
    </div>
@endsection
