@extends('layouts.admin')

@section('content')
    <h1>{{$title}}</h1>

    <div class="card">
        <div class="card-header">
            <div class="">
                <a class="btn btn-sm btn-outline-secondary" href="{{route('admin.employees.index')}}">Employees</a>
            </div>
        </div>
        <div class="card-body">

        </div>
        <div class="card-footer">
            <a href="{{route('employees.edit',['employee'=>$employee])}}" class="btn btn-sm btn-outline-primary">Edit</a>
        </div>
    </div>
@endsection
