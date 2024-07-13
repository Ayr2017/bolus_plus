@extends('layouts.admin')

@section('content')
    <h1>{{$title}}</h1>
    <div class="">
        <a class="btn btn-sm btn-outline-primary" href="{{route('admin.organisations.create')}}">Create</a>
    </div>
    @include('admin.organisations.partials.organisations-table')
@endsection
