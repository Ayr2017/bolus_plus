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
        <div class="card-body">
            @include('bolus-readings.partials.bolus-readings-table')
        </div>
        <div class="card-footer">
            <div class="d-flex">
                {!! $bolus_readings->links() !!}
            </div>
        </div>
    </div>
@endsection
