@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <div class="">
        @include('events.partials.select-create-event-type-modal')
    </div>
    @include('events.partials.events-table')
@endsection
