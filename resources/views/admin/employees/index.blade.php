@extends('layouts.admin')

@section('content')
    <h1>Employees</h1>
    <div class="">
        <a class="btn btn-sm btn-outline-primary" href="{{route('admin.employees.create')}}">Create</a>
    </div>
    @include('admin.employees.partials.employees-table')
@endsection
