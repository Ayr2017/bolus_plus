@extends('layouts.admin')

@section('content')
    <h1>{{$title}}</h1>

    <div class="card">
        <div class="card-header">
            <div class="">
                @include('admin.permissions.partials.create-modal')
            </div>
        </div>
        <div class="card-body">
            @include('admin.permissions.partials.permissions-table')
        </div>
        <div class="card-footer"></div>
    </div>
@endsection
