@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>

    <div class="card">
        <div class="card-header">
            <div class="">
                @include('permissions.partials.create-modal')
            </div>
        </div>
        <div class="card-body">
            @include('permissions.partials.permissions-table')
        </div>
        <div class="card-footer"></div>
    </div>
@endsection
