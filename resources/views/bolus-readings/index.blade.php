@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>

    <div class="card">
        <div class="card-header">
            <div class="">
{{--                <a class="btn btn-sm btn-outline-primary"--}}
{{--                   href="{{route('bolus-readings.create')}}">Create</a>--}}
                <form action="{{route('bolus-readings.pull')}}" method="post">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-sm btn-outline-primary" type="submit">Pull</button>
                </form>
            </div>
        </div>
        <div class="card-header bg-secondary-subtle">
            @include('bolus-readings.partials.bolus-readings-filter')
        </div>
        <div class="card-body">
            @isset($bolus_readings)
            @include('bolus-readings.partials.bolus-readings-table')
            @endisset
        </div>
        <div class="card-footer">
            <div class="d-flex">
                {!! $bolus_readings->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
