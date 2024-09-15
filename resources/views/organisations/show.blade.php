@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <div class="">
        <div class="col-6">
            <div class="card ">
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
                            <td>{{$organisation->id}}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$organisation->name}}</td>
                        </tr>
                        <tr>
                            <th>Structural unit</th>
                            <td>{{$organisation->structuralUnit?->name}}</td>
                        </tr>
                        <tr>
                            <th>Parent</th>
                            <td>
                                @if($organisation->parent)
                                    <a href="{{route('organisations.show',['organisation'=>$organisation->parent?->id])}}">
                                        {{$organisation->parent?->name}}
                                    </a>
                                @else
                                    no parent
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Created at</th>
                            <td>{{$organisation->created_at}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sm btn-outline-secondary"
                       href="{{route('organisations.index')}}">All organisations</a>
                    <a class="btn btn-sm btn-outline-primary"
                       href="{{route('organisations.edit',['organisation' => $organisation])}}">Edit</a>
                    @include('layouts.partials.delete-modal',['item'=>$organisation, 'message'=>'Animal will delete','route'=>route('organisations.destroy',['organisation'=>$organisation])])
                </div>
            </div>
        </div>
    </div>
@endsection
