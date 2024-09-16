@extends('layouts.app')

@section('content')
    <div class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
        <h2>{{$title}}</h2>

        <a
            class="btn btn-outline-secondary"
            href="{{route('admin.roles.index')}}"
        >
            Roles
        </a>
        <a
            href="{{route('admin.roles.edit', ['role'=>$role])}}"
            class="btn btn-sm btn-outline-primary"
        >
            Edit
        </a>
    </div>

    <div class="my-4">
        <p>Name:{{$role->name}}</p>
        <p>Guard: {{$role->guard_name}}</p>

        <h5>Permissions</h5>
        @foreach($role->permissions as $permission)
            <span
                class="mx-1 p-1 {{
                    $loop->iteration%2 == 0
                    ? 'bg-info-subtle'
                    : 'bg-warning-subtle'
                }}"
            >
                {{$permission->name}}
            </span>
        @endforeach
    </div>
@endsection
