@extends('layouts.app')

@section('content')
    <div class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
        <h2>{{$title}}</h2>

        <a
            href="{{route('dashboards.create')}}"
            type="button"
            class="btn btn-sm btn-outline-primary"
        >
            Create
        </a>
    </div>

    <div class="row">
        @foreach($dashboards as $dashboard)
            <div class="col-4">
                <a
                    href="{{route('dashboards.show', $dashboard)}}"
                    class="card text-decoration-none"
                >
                    <div class="card-body">
                        <h5 class="card-title mb-0">
                            {{ $dashboard->name }}
                        </h5>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

@endsection
