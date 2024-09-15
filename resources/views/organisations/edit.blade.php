@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <div class="">
        <div class="col-12">
            @include('organisations.partials.organisation-edit-form')
        </div>

    </div>
@endsection
