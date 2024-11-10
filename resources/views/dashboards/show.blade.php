@extends('layouts.fullscreen')

@section('content')
    <div class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
        <div class="d-flex gap-2 align-items-center">
            <button
                class="btn btn-sm btn-outline-secondary me-2"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample"
            >
                <i class="bi bi-list"></i>
            </button>
            <h2 class="m-0">{{$title}}</h2>
        </div>
        <a class="btn btn-outline-secondary" href="{{route('dashboards.index')}}">Dashboards</a>
    </div>

    <div id="dashboard">
        <Dashboard :dashboard-data="{{$bolus_readings}}" />
    </div>
@endsection
