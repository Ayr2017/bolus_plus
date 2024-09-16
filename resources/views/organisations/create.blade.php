@extends('layouts.app')

@section('content')
    <div class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
        <h2>{{$title}}</h2>
    </div>

    <div class="my-4 row">
        <div class="col-6">
            @include('organisations.partials.organisation-create-form')
        </div>
    </div>
@endsection
