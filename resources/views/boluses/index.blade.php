@extends('layouts.admin')

@section('content')
    <h1>{{$title}}</h1>

    <div class="card">
        <div class="card-header">
            <div class="">
                <a class="btn btn-sm btn-outline-primary" href="{{route('boluses.create')}}">Create</a>
            </div>
        </div>
        <div class="card-body">
            @include('boluses.partials.boluses-table')
        </div>
        <div class="card-footer"></div>
    </div>
@endsection
