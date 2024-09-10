@extends('layouts.admin')

@section('content')
    <h1>{{$title}}</h1>

    <div class="card">
        <div class="card-header">
            <div class="">
                @include('admin.roles.partials.create-modal')
            </div>
        </div>
        <div class="card-body">
            @include('admin.roles.partials.roles-table')
        </div>
        <div class="card-footer"></div>
    </div>
@endsection
