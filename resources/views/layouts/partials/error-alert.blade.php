@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert" aria-live="assertive" aria-atomic="true">
        @foreach ($errors->all() as $error)
            <div>{{$error}} {{$error}} {{$error}} {{$error}} {{$error}} {{$error}} {{$error}} {{$error}}{{$error}} {{$error}} {{$error}} {{$error}} {{$error}} {{$error}} {{$error}} {{$error}} </div>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

