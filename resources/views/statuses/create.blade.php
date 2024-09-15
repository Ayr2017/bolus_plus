@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <div class="">
        <div class="col-6">
            @include('statuses.partials.status-create-form')
        </div>
    </div>
@endsection
