@extends('layouts.app')

@section('content')
    <div class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
        <h2>{{$title}}</h2>

        <a
            class="btn btn-outline-secondary"
            href="{{route('events.index')}}"
        >
            All events
        </a>
        <a
            class="btn btn-outline-primary"
            href="{{route('events.edit',['event' => $event])}}"
        >
            Edit
        </a>
    </div>

    <div class="my-4">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $key =>$value )
                <tr>
                    <th>{{$key}}</th>
                    <td>{{$value}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>

        @include(
            'layouts.partials.delete-modal',
            [
                'item'=>$event,
                'message'=>'Event will delete',
                'route'=>route('events.destroy', ['event'=>$event])
            ]
        )
    </div>
@endsection
