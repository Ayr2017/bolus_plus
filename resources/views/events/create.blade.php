@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <div class="">
        <div class="col-12">
            @include('events.partials.event-create.'.$form_name)
        </div>

    </div>
@endsection
