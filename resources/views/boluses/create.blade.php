@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <div class="">
        <div class="col-6">
            @include('boluses.partials.bolus-create-form')
        </div>
    </div>
@endsection
