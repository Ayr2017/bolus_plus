@extends('layouts.admin')

@section('content')
    <h1>{{$title}}</h1>
    <div class="">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-sm btn-outline-secondary" href="{{route('statuses.index')}}">All statuses</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>Id</th>
                            <td>{{$status->id}}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$status->name}}</td>
                        </tr>
                        <tr>
                            <th>Slug</th>
                            <td>{{$status->slug}}</td>
                        </tr>
                        <tr>
                            <th>Created at</th>
                            <td>{{$status->created_at}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sm btn-outline-primary" href="{{route('statuses.edit',['status' => $status])}}">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
