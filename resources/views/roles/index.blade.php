@extends('layouts.admin')

@section('content')
    <h1>{{$title}}</h1>

    <div class="card">
        <div class="card-header">
            <div class="">
                @include('roles.partials.create-modal')
            </div>
        </div>
        <div class="card-body">
            @include('roles.partials.roles-table')
        </div>
        <div class="card-footer"></div>
    </div>
@endsection
