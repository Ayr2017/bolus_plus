@extends('layouts.admin')

@section('content')
    <h1>{{$title}}</h1>
    <div class="">
        <div class="col-6">
            @include('breeds.partials.breed-edit-form')
        </div>
    </div>
@endsection
