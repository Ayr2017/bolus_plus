@extends('layouts.admin')

@section('content')
    <h1>{{$title}}</h1>
    <div class="">
        <div class="col-12">
            @include('animals.partials.animal-edit-form')
        </div>

    </div>
@endsection
