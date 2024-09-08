@if($errors->any())
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast fade show " role="alert" aria-live="assertive" aria-atomic="true" id="liveToast">
            <div class="toast-header bg-danger-subtle">
                <i class="bi bi-info-circle text-danger fw-bolder"></i>
                <strong class="me-auto text-danger">Error</strong>
                <small></small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                @foreach($errors->all() as $error)
                    <p class="text-danger ">{{$error}}</p>
                @endforeach
            </div>
        </div>
    </div>
@endif
