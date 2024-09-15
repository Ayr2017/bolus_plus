@extends('layouts.admin')

@section('content')
    <h1>{{$title}}</h1>
    <div class="">
        <div class="col-6">
            <div class="card ">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>Id</th>
                            <td>{{$event->id}}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{$event->event_category}}</td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td>{{$event->event_type}}</td>
                        </tr>
                        @include('events.partials.show.'.$view_name)
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sm btn-outline-secondary" href="{{route('events.index')}}">All events</a>
                    <a class="btn btn-sm btn-outline-primary" href="{{route('events.edit',['event' => $event])}}">Edit</a>
                    @include('layouts.partials.delete-modal',['item'=>$event, 'message'=>'Event will delete','route'=>route('events.destroy',['event'=>$event])])
                </div>
            </div>
        </div>
    </div>
@endsection
