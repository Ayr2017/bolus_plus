@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <div class="">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
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
                            <td>{{$breed->id}}</td>
                        </tr>
                        <tr>
                            <th>UUID</th>
                            <td>{{$breed->uuid}}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$breed->name}}</td>
                        </tr>
                        <tr>
                            <th>Created at</th>
                            <td>{{$breed->created_at}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sm btn-outline-secondary" href="{{route('breeds.index')}}">All
                        breeds</a>
                    <a class="btn btn-sm btn-outline-primary"
                       href="{{route('breeds.edit',['breed' => $breed])}}">Edit</a>
                    @include('layouts.partials.delete-modal',['item'=>$breed, 'message' =>null, 'route' => route('breeds.destroy',['breed' => $breed])])
                </div>
            </div>
        </div>
    </div>
@endsection
